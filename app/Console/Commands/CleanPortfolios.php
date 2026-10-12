<?php

namespace App\Console\Commands;

use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanPortfolios extends Command
{
    /**
     * Nama dan signature command.
     */
    protected $signature = 'portfolio:clean {--all : Hapus SEMUA portofolio sehingga tabel 100% kosong}';

    /**
     * Deskripsi command.
     */
    protected $description = 'Bersihkan data dummy sampah dan rapikan portofolio';

    public function handle(): int
    {
        if ($this->option('all')) {
            $this->warn('🗑️ Menghapus SEMUA data portofolio dan galeri...');
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            PortfolioImage::truncate();
            Portfolio::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            $this->info('✨ Selesai! Tabel portofolio sekarang 100% KOSONG dan bersih, siap untuk foto asli.');
            return 0;
        }

        $this->info('🧹 Membersihkan data dummy sampah dari tabel portofolio...');

        // Daftar judul dummy sampah yang harus dihapus
        $junkTitles = [
            'Process',
            'Statement',
            'Service',
            'Service ',
            'About',
            'Team',
            'Hero Living',
            'Logo Mark',
            'Gallery',
            'Apartment ',
            'Booth ',
            'Fnb ',
            'Landed ',
            'Office ',
        ];

        $deletedCount = 0;

        foreach ($junkTitles as $junk) {
            $deleted = Portfolio::where('title', 'like', "%{$junk}%")
                ->orWhere('slug', 'like', "%" . strtolower($junk) . "%")
                ->forceDelete();
            $deletedCount += $deleted;
        }

        // Hapus juga gambar galeri yang yatim (tanpa portfolio_id valid)
        $validIds = Portfolio::pluck('id');
        PortfolioImage::whereNotIn('portfolio_id', $validIds)->delete();

        $remainingCount = Portfolio::count();

        $this->info("✨ Berhasil menghapus {$deletedCount} data dummy sampah!");
        $this->info("📌 Portofolio yang tersisa: {$remainingCount} proyek resmi.");

        return 0;
    }
}
