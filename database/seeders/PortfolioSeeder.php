<?php

namespace Database\Seeders;

use App\Models\PortfolioCategory;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // ---- Kategori ----
        $categories = [
            ['name' => 'Landed House', 'description' => 'Proyek desain interior rumah tapak / landed house.'],
            ['name' => 'Apartment',    'description' => 'Proyek desain interior unit apartemen.'],
            ['name' => 'F&B',          'description' => 'Proyek desain interior kafe, restoran, dan F&B.'],
            ['name' => 'Booth',        'description' => 'Proyek desain dan produksi booth event.'],
            ['name' => 'Office',       'description' => 'Proyek desain interior ruang kantor.'],
        ];

        $categoryMap = [];
        foreach ($categories as $cat) {
            $category = PortfolioCategory::updateOrCreate(
                ['slug' => Str::slug($cat['name'])],
                array_merge($cat, ['slug' => Str::slug($cat['name']), 'status' => 'active'])
            );
            $categoryMap[$cat['name']] = $category->id;
        }

        // ---- Portofolio ----
        $portfolios = [
            [
                'category'     => 'Landed House',
                'title'        => 'Kitchen Set PIK',
                'client_name'  => 'Mr. A',
                'location'     => 'PIK, Jakarta Utara',
                'project_type' => 'Kitchen Set',
                'room_type'    => 'Kitchen',
                'design_style' => 'Modern Minimalist',
                'year'         => 2023,
                'description'  => 'Proyek kitchen set modern minimalist dengan material HPL premium dan finishing duco putih. Desain mengutamakan efisiensi ruang dan kemudahan akses untuk kegiatan memasak sehari-hari.',
            ],
            [
                'category'     => 'Landed House',
                'title'        => 'Master Bedroom Cengkareng',
                'client_name'  => 'Mr. B',
                'location'     => 'Cengkareng, Jakarta Barat',
                'project_type' => 'Master Bedroom',
                'room_type'    => 'Bedroom',
                'design_style' => 'Modern Luxury',
                'year'         => 2023,
                'description'  => 'Desain kamar tidur utama dengan nuansa mewah dan elegan. Menggunakan material premium seperti wallpaper tekstur, headboard custom, dan pencahayaan ambient yang hangat.',
            ],
            [
                'category'     => 'Landed House',
                'title'        => 'Full House Jelambar',
                'client_name'  => 'Mrs. C',
                'location'     => 'Jelambar, Jakarta Barat',
                'project_type' => 'Full House',
                'room_type'    => 'Full House',
                'design_style' => 'Modern Contemporary',
                'year'         => 2022,
                'description'  => 'Proyek full house renovation mencakup seluruh ruangan rumah 2 lantai. Desain kontemporer dengan sentuhan warna earth tone yang hangat dan fungsional untuk keluarga.',
            ],
            [
                'category'     => 'Apartment',
                'title'        => 'Apartment Studio Bekasi',
                'client_name'  => 'Mr. D',
                'location'     => 'Bekasi, Jawa Barat',
                'project_type' => 'Full Unit Studio',
                'room_type'    => 'Studio',
                'design_style' => 'Japandi',
                'year'         => 2023,
                'description'  => 'Desain studio apartment dengan konsep Japandi — perpaduan Jepang dan Skandinavia. Mengutamakan kesederhanaan, material alami (kayu, rotan), dan ketenangan visual.',
            ],
            [
                'category'     => 'F&B',
                'title'        => 'KATA Kopi PIK',
                'client_name'  => 'KATA Kopi',
                'location'     => 'PIK, Jakarta Utara',
                'project_type' => 'Coffee Shop',
                'room_type'    => 'F&B Space',
                'design_style' => 'Modern Industrial',
                'year'         => 2022,
                'description'  => 'Desain coffee shop dengan tema industrial modern. Kombinasi exposed bricks, besi hitam, dan kayu reclaimed menciptakan suasana yang cozy namun tetap stylish untuk pelanggan.',
            ],
            [
                'category'     => 'Office',
                'title'        => 'Office Interior Jakarta',
                'client_name'  => 'PT. XYZ',
                'location'     => 'Jakarta Selatan',
                'project_type' => 'Office Interior',
                'room_type'    => 'Office Room',
                'design_style' => 'Modern Professional',
                'year'         => 2023,
                'description'  => 'Desain interior kantor modern yang mendorong produktivitas dan kolaborasi tim. Layout open plan dengan area meeting room, pantry, dan workstation yang ergonomis.',
            ],
        ];

        foreach ($portfolios as $p) {
            Portfolio::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                [
                    'portfolio_category_id' => $categoryMap[$p['category']],
                    'title'                 => $p['title'],
                    'slug'                  => Str::slug($p['title']),
                    'client_name'           => $p['client_name'],
                    'location'              => $p['location'],
                    'project_type'          => $p['project_type'],
                    'room_type'             => $p['room_type'],
                    'design_style'          => $p['design_style'],
                    'description'           => $p['description'],
                    'year'                  => $p['year'],
                    'main_image'            => null,
                    'status'                => 'published',
                ]
            );
        }
    }
}
