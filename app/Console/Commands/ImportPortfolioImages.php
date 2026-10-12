<?php

namespace App\Console\Commands;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImportPortfolioImages extends Command
{
    /**
     * Nama dan signature command.
     */
    protected $signature = 'portfolio:import-images {--folder= : Folder kustom yang ingin di-scan (misal: storage/app/public/portfolios atau public/assets/images)}';

    /**
     * Deskripsi command.
     */
    protected $description = 'Import dan daftarkan banyak gambar portofolio dari Google Drive / folder secara otomatis ke database';

    public function handle(): int
    {
        $this->info('🚀 Memulai pemindaian dan sinkronisasi gambar portofolio ke database...');

        // 1. Inisialisasi 5 Kategori Sesuai Folder Google Drive
        $categoryMapping = [
            'Landed House' => ['keywords' => ['landed', 'house', 'rumah'], 'desc' => 'Proyek desain interior rumah tapak / landed house.'],
            'Apartment'    => ['keywords' => ['apartemen', 'apartment', 'apart'], 'desc' => 'Proyek desain interior unit apartemen.'],
            'F&B'          => ['keywords' => ['restaurant', 'cafe', 'kopi', 'f&b', 'fnb', 'resto'], 'desc' => 'Proyek desain interior kafe, restoran, dan F&B.'],
            'Office'       => ['keywords' => ['office', 'kantor'], 'desc' => 'Proyek desain interior ruang kantor.'],
            'Booth'        => ['keywords' => ['booth', 'pameran', 'exhibition'], 'desc' => 'Proyek desain dan produksi booth event.'],
        ];

        $categories = [];
        foreach ($categoryMapping as $name => $data) {
            $cat = PortfolioCategory::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'description' => $data['desc'], 'status' => 'active']
            );
            $categories[$name] = $cat->id;
        }

        // 2. Cari Folder Input (Bisa dari option, storage, atau public)
        $customFolder = $this->option('folder');
        $foldersToCheck = $customFolder 
            ? [base_path($customFolder)] 
            : [
                storage_path('app/public/portfolios'),
                public_path('assets/images/portfolio-drive'),
                public_path('assets/images'),
            ];

        $targetFolder = null;
        foreach ($foldersToCheck as $f) {
            if (File::isDirectory($f)) {
                $targetFolder = $f;
                break;
            }
        }

        if (!$targetFolder) {
            $this->error("❌ Folder gambar tidak ditemukan!");
            return 1;
        }

        $this->info("📁 Folder yang dipindai: [{$targetFolder}]");

        // 3. Scan Semua File Gambar (Termasuk Subfolder Google Drive)
        $allFiles = File::allFiles($targetFolder);
        $imageExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $uiAssetsToIgnore = [
            'about.jpg',
            'hero-living.jpg',
            'logo-mark.png',
            'process.jpg',
            'statement.jpg',
            'team.png',
            'service-01.jpg',
            'service-02.jpg',
            'service-03.jpg',
        ];

        $imageFiles = array_filter($allFiles, function ($f) use ($imageExtensions, $uiAssetsToIgnore) {
            $ext = strtolower($f->getExtension());
            $name = strtolower($f->getFilename());
            return in_array($ext, $imageExtensions) && !in_array($name, $uiAssetsToIgnore);
        });

        $this->info("📸 Ditemukan " . count($imageFiles) . " file gambar portofolio.");

        if (empty($imageFiles)) {
            $this->warn("⚠️ Tidak ada gambar portofolio yang ditemukan.");
            return 0;
        }

        // Kelompokkan file berdasarkan folder proyek atau kategori
        $projectsGrouped = [];

        foreach ($imageFiles as $file) {
            $filename = $file->getFilename();
            $dirName = $file->getPath();
            $subPath = str_replace(base_path() . '/', '', $file->getRealPath());
            $subPath = str_replace('\\', '/', $subPath);

            // Tentukan kategori dari path folder
            $detectedCategory = 'Landed House';
            $pathLower = strtolower($file->getRealPath());

            foreach ($categoryMapping as $catName => $data) {
                foreach ($data['keywords'] as $kw) {
                    if (str_contains($pathLower, $kw)) {
                        $detectedCategory = $catName;
                        break 2;
                    }
                }
            }

            // Tentukan nama proyek dari nama subfolder (misal: "PIK", "Regatta", "KATA Kopi")
            $folderBasename = basename($dirName);
            $parentFolderBasename = basename(dirname($dirName));

            // Jika file berada di dalam subfolder proyek khusus
            $isDirectCategoryFolder = false;
            foreach ($categoryMapping as $data) {
                foreach ($data['keywords'] as $kw) {
                    if (str_contains(strtolower($folderBasename), $kw)) {
                        $isDirectCategoryFolder = true;
                        break 2;
                    }
                }
            }

            if (!$isDirectCategoryFolder && $folderBasename !== 'images' && $folderBasename !== 'portfolios') {
                $projectTitle = Str::title(str_replace(['-', '_'], ' ', $folderBasename));
            } else {
                // Buat title dari nama file
                $cleanName = pathinfo($filename, PATHINFO_FILENAME);
                $cleanName = preg_replace('/^[pP][-_]/', '', $cleanName);
                $cleanName = preg_replace('/\d+$/', '', $cleanName);
                $projectTitle = Str::title(str_replace(['-', '_'], ' ', trim($cleanName))) ?: 'Proyek ' . $detectedCategory;
            }

            $groupKey = $detectedCategory . '::' . $projectTitle;

            if (!isset($projectsGrouped[$groupKey])) {
                $projectsGrouped[$groupKey] = [
                    'category' => $detectedCategory,
                    'title'    => $projectTitle,
                    'images'   => [],
                ];
            }

            // Simpan relative path untuk URL publik
            // Jika file ada di storage/app/public, relative path-nya 'portfolios/...'
            if (str_contains($subPath, 'storage/app/public/')) {
                $publicPath = str_replace('storage/app/public/', '', $subPath);
            } elseif (str_contains($subPath, 'public/')) {
                $publicPath = str_replace('public/', '', $subPath);
            } else {
                $publicPath = $subPath;
            }

            $projectsGrouped[$groupKey]['images'][] = $publicPath;
        }

        // 4. Masukkan ke Database
        $totalProjects = 0;
        $totalGallery = 0;

        foreach ($projectsGrouped as $group) {
            $catId = $categories[$group['category']] ?? $categories['Landed House'];
            $mainImg = $group['images'][0] ?? null;

            $portfolio = Portfolio::updateOrCreate(
                ['slug' => Str::slug($group['title'])],
                [
                    'portfolio_category_id' => $catId,
                    'title'                 => $group['title'],
                    'slug'                  => Str::slug($group['title']),
                    'client_name'           => 'Private Client',
                    'location'              => 'Jakarta, Indonesia',
                    'project_type'          => $group['category'],
                    'design_style'          => 'Modern Luxury',
                    'description'           => "Proyek arsitektur & interior {$group['category']} berkualitas tinggi oleh Pratama Design Studio.",
                    'year'                  => date('Y'),
                    'main_image'            => $mainImg,
                    'status'                => 'published',
                ]
            );

            // Foto lainnya dimasukkan ke galeri
            if (count($group['images']) > 1) {
                for ($i = 1; $i < count($group['images']); $i++) {
                    PortfolioImage::firstOrCreate([
                        'portfolio_id' => $portfolio->id,
                        'image'        => $group['images'][$i],
                    ]);
                    $totalGallery++;
                }
            }

            $this->line("  ✓ Proyek: <comment>{$group['title']}</comment> [{$group['category']}] -> " . count($group['images']) . " foto");
            $totalProjects++;
        }

        $this->info("\n🎉 SUKSES! Sebanyak {$totalProjects} proyek dan {$totalGallery} foto galeri berhasil didaftarkan ke database!");
        $this->info("🌐 Frontend bisa langsung mengambil semua data via: GET /api/portfolios");

        return 0;
    }
}
