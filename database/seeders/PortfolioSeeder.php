<?php

namespace Database\Seeders;

use App\Models\PortfolioCategory;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // ---- 1. Kategori Portofolio ----
        $categories = [
            ['name' => 'Landed House', 'description' => 'Proyek rancang bangun & interior rumah tinggal tapak.'],
            ['name' => 'Apartment',    'description' => 'Proyek interior apartemen studio, 2BR, hingga penthouse.'],
            ['name' => 'F&B',          'description' => 'Proyek desain & fit-out kafe, resto, roastery, dan dining space.'],
            ['name' => 'Booth',        'description' => 'Proyek custom exhibition booth, pop-up store, dan modular event.'],
            ['name' => 'Office',       'description' => 'Proyek interior kantor, lobby korporat, dan meeting room profesional.'],
        ];

        $categoryMap = [];
        foreach ($categories as $cat) {
            $category = PortfolioCategory::updateOrCreate(
                ['slug' => Str::slug($cat['name'])],
                array_merge($cat, ['slug' => Str::slug($cat['name']), 'status' => 'active'])
            );
            $categoryMap[$cat['name']] = $category->id;
        }

        // ---- 2. Katalog Portofolio Lengkap (17 Karya Nyata Studio) ----
        $portfolios = [
            // == LANDED HOUSE ==
            [
                'category'     => 'Landed House',
                'title'        => 'Kitchen Set PIK',
                'client_name'  => 'Mr. Andy',
                'location'     => 'PIK, Jakarta Utara',
                'project_type' => 'Kitchen Set',
                'room_type'    => 'Kitchen',
                'design_style' => 'Modern Minimalist',
                'year'         => 2023,
                'description'  => 'Proyek kitchen set modern minimalist dengan material HPL premium dan finishing duco putih. Dilengkapi island table ergonomis, rak piring stainless steel tarik, serta ambient hidden LED strip.',
                'main_image'   => 'assets/images/p-landed-03.jpg',
                'gallery'      => ['assets/images/p-landed-04.jpg', 'assets/images/p-landed-05.jpg'],
            ],
            [
                'category'     => 'Landed House',
                'title'        => 'Master Bedroom Cengkareng',
                'client_name'  => 'Mr. Andreas',
                'location'     => 'Cengkareng, Jakarta Barat',
                'project_type' => 'Master Bedroom',
                'room_type'    => 'Bedroom',
                'design_style' => 'Modern Luxury',
                'year'         => 2023,
                'description'  => 'Desain kamar tidur utama bernuansa hangat dan mewah. Menggunakan backdrop panel fabric linen, headboard custom empuk, nakas gantung minimalis, dan pencahayaan warm white tersembunyi.',
                'main_image'   => 'assets/images/p-landed-02.jpg',
                'gallery'      => ['assets/images/p-landed-01.jpg', 'assets/images/toc-bedroom.jpg'],
            ],
            [
                'category'     => 'Landed House',
                'title'        => 'Full House Jelambar',
                'client_name'  => 'Mr. Ody',
                'location'     => 'Jelambar, Jakarta Barat',
                'project_type' => 'Full House',
                'room_type'    => 'Full House',
                'design_style' => 'Modern Contemporary',
                'year'         => 2022,
                'description'  => 'Renovasi total rumah 2 lantai berkonsep kontemporer dengan palet earth tone hangat. Mencakup ruang keluarga, ruang makan terpadu, dapur bersih, dan kamar tidur fungsional.',
                'main_image'   => 'assets/images/p-landed-01.jpg',
                'gallery'      => ['assets/images/p-landed-02.jpg', 'assets/images/hero-living.jpg'],
            ],
            [
                'category'     => 'Landed House',
                'title'        => 'Rainbow Cluster Residence',
                'client_name'  => 'Keluarga Pratama',
                'location'     => 'West Kalimantan',
                'project_type' => 'Full House Architecture & Interior',
                'room_type'    => 'Living & Dining',
                'design_style' => 'Modern Tropical',
                'year'         => 2023,
                'description'  => 'Rancang bangun arsitektur dan interior rumah tapak berkonsep modern tropis. Pencahayaan alami maksimal dengan jendela besar dan sirkulasi silang yang sejuk.',
                'main_image'   => 'assets/images/p-landed-05.jpg',
                'gallery'      => ['assets/images/p-landed-04.jpg', 'assets/images/service-01.jpg'],
            ],
            [
                'category'     => 'Landed House',
                'title'        => 'Living Room Duri Mas',
                'client_name'  => 'Mr. Denny',
                'location'     => 'Duri Mas, Jakarta Barat',
                'project_type' => 'Living Room Fit-Out',
                'room_type'    => 'Living Room',
                'design_style' => 'Modern Luxury',
                'year'         => 2023,
                'description'  => 'Penataan ruang keluarga mewah dengan panel marmer backdrop TV, credenza gantung 3 meter, dan sofa lounge empuk yang menyatu dengan area ruang makan.',
                'main_image'   => 'assets/images/service-01.jpg',
                'gallery'      => ['assets/images/statement.jpg', 'assets/images/cover-armchair.jpg'],
            ],
            [
                'category'     => 'Landed House',
                'title'        => 'Kitchen & Pantry Green Garden',
                'client_name'  => 'Mrs. Ajeng',
                'location'     => 'Green Garden, Jakarta Barat',
                'project_type' => 'Kitchen Set & Pantry',
                'room_type'    => 'Kitchen',
                'design_style' => 'Warm Minimalist',
                'year'         => 2023,
                'description'  => 'Kitchen set wet & dry terintegrasi dengan counter top granit Nero Assoluto, ambalan terbuka display bumbu, dan kabinet anti rayap standar workshop Pratama.',
                'main_image'   => 'assets/images/p-landed-04.jpg',
                'gallery'      => ['assets/images/p-landed-03.jpg'],
            ],

            // == APARTMENT ==
            [
                'category'     => 'Apartment',
                'title'        => 'Apartment Studio Pakuwon Bekasi',
                'client_name'  => 'Mr. Jemmy',
                'location'     => 'Pakuwon, Bekasi',
                'project_type' => 'Full Unit Studio',
                'room_type'    => 'Studio',
                'design_style' => 'Japandi Modern',
                'year'         => 2023,
                'description'  => 'Desain studio apartment 24m² dengan konsep Japandi — perpaduan fungsional Skandinavia dan kehangatan kayu oak Jepang. Tempat tidur dengan laci penyimpanan bawah dan meja kerja multifungsi.',
                'main_image'   => 'assets/images/p-apartment-01.jpg',
                'gallery'      => ['assets/images/p-apartment-02.jpg', 'assets/images/p-apartment-03.jpg'],
            ],
            [
                'category'     => 'Apartment',
                'title'        => 'Full Unit 3BR Meikarta',
                'client_name'  => 'Mr. Vafet',
                'location'     => 'Apt. Meikarta, Cikarang',
                'project_type' => 'Full Unit 3 Bedroom',
                'room_type'    => '3 Bedroom',
                'design_style' => 'Modern Contemporary',
                'year'         => 2023,
                'description'  => 'Fit-out komprehensif unit apartemen 3 kamar tidur. Setiap kamar memiliki karakter personal namun selaras dalam palet warna netral warm luxury.',
                'main_image'   => 'assets/images/p-apartment-02.jpg',
                'gallery'      => ['assets/images/p-apartment-01.jpg', 'assets/images/service-03.jpg'],
            ],
            [
                'category'     => 'Apartment',
                'title'        => 'Master Suite Green Park View',
                'client_name'  => 'Mrs. Jesica',
                'location'     => 'Apt. Green Park View, Jakarta',
                'project_type' => 'Master Bedroom Suite',
                'room_type'    => 'Bedroom',
                'design_style' => 'Warm Luxury',
                'year'         => 2022,
                'description'  => 'Transformasi kamar tidur utama apartemen menjadi sanctuary pribadi yang tenang. Dilengkapi walk-in closet mungil terorganisir dan meja rias berpencahayaan lembut.',
                'main_image'   => 'assets/images/p-apartment-03.jpg',
                'gallery'      => ['assets/images/toc-bedroom.jpg', 'assets/images/p-apartment-02.jpg'],
            ],

            // == F&B ==
            [
                'category'     => 'F&B',
                'title'        => 'KATA Kopi PIK',
                'client_name'  => 'KATA Kopi',
                'location'     => 'PIK, Jakarta Utara',
                'project_type' => 'Coffee Shop & Roastery',
                'room_type'    => 'F&B Space',
                'design_style' => 'Modern Industrial',
                'year'         => 2022,
                'description'  => 'Desain kedai kopi dengan tema industrial hangat. Kombinasi semen ekspos, besi hitam, aksen kayu reclaimed, dan bar counter beton yang ikonik.',
                'main_image'   => 'assets/images/p-fnb-01.jpg',
                'gallery'      => ['assets/images/p-fnb-02.jpg', 'assets/images/p-fnb-03.jpg'],
            ],
            [
                'category'     => 'F&B',
                'title'        => 'Kampung Burger Depok',
                'client_name'  => 'Kampung Burger',
                'location'     => 'Margonda, Depok',
                'project_type' => 'Fast Casual Dining',
                'room_type'    => 'F&B Space',
                'design_style' => 'Industrial Warm',
                'year'         => 2022,
                'description'  => 'Interior restoran cepat saji bernuansa hangat dengan layout meja fleksibel, signage neon kontemporer, dan alur pemesanan counter yang efisien.',
                'main_image'   => 'assets/images/p-fnb-02.jpg',
                'gallery'      => ['assets/images/p-fnb-01.jpg'],
            ],
            [
                'category'     => 'F&B',
                'title'        => 'PanMee Resto Mangga Besar',
                'client_name'  => 'PanMee Group',
                'location'     => 'Mangga Besar, Jakarta Barat',
                'project_type' => 'Restaurant Fit-Out',
                'room_type'    => 'F&B Space',
                'design_style' => 'Modern Oriental',
                'year'         => 2023,
                'description'  => 'Desain restoran berkonsep modern oriental yang bersih dan nyaman. Partisi kisi-kisi kayu pembatas meja memberikan privasi santai bagi pengunjung.',
                'main_image'   => 'assets/images/p-fnb-03.jpg',
                'gallery'      => ['assets/images/p-fnb-02.jpg', 'assets/images/service-02.jpg'],
            ],
            [
                'category'     => 'F&B',
                'title'        => 'Muragaru Coffee Gading Serpong',
                'client_name'  => 'Muragaru Specialty Coffee',
                'location'     => 'Gading Serpong, Tangerang',
                'project_type' => 'Coffee & Bakery',
                'room_type'    => 'F&B Space',
                'design_style' => 'Japandi Coffee Bar',
                'year'         => 2023,
                'description'  => 'Spesialis coffee bar bernuansa kayu terang dan pencahayaan aksen lembut yang menonjolkan etalase pastry serta area seduh manual.',
                'main_image'   => 'assets/images/service-02.jpg',
                'gallery'      => ['assets/images/p-fnb-01.jpg'],
            ],

            // == BOOTH ==
            [
                'category'     => 'Booth',
                'title'        => 'Bubee Commercial Booth',
                'client_name'  => 'Bubee Indonesia',
                'location'     => 'Tomang, Jakarta Barat',
                'project_type' => 'Retail Pop-Up Booth',
                'room_type'    => 'Commercial Booth',
                'design_style' => 'Modern Compact',
                'year'         => 2023,
                'description'  => 'Booth penjualan modular portabel dengan display produk menarik, sistem kelistrikan tersembunyi, dan signage akrilik berpendar LED.',
                'main_image'   => 'assets/images/p-booth-01.jpg',
                'gallery'      => ['assets/images/p-booth-02.jpg'],
            ],
            [
                'category'     => 'Booth',
                'title'        => 'Exhibition Booth ICE BSD',
                'client_name'  => 'G-Power Partner',
                'location'     => 'ICE BSD, Tangerang',
                'project_type' => 'Exhibition Booth',
                'room_type'    => 'Commercial Booth',
                'design_style' => 'High-Tech Modern',
                'year'         => 2023,
                'description'  => 'Desain dan fabrikasi custom booth pameran skala besar dengan panggung presentasi, layar LED interaktif, dan ruang hospitality VIP.',
                'main_image'   => 'assets/images/p-booth-02.jpg',
                'gallery'      => ['assets/images/p-booth-01.jpg'],
            ],

            // == OFFICE ==
            [
                'category'     => 'Office',
                'title'        => 'Lobby Lift & Lounge DPR RI',
                'client_name'  => 'Fraksi DPR RI',
                'location'     => 'Senayan, Jakarta Pusat',
                'project_type' => 'VIP Lobby & Lounge',
                'room_type'    => 'Corporate Lobby',
                'design_style' => 'Modern Elegance',
                'year'         => 2023,
                'description'  => 'Penataan lobby lift dan area tunggu eksekutif berstandar kenegaraan. Material panel kayu jati solid, pilar marmer, dan pencahayaan architectural lighting berwibawa.',
                'main_image'   => 'assets/images/p-office-01.jpg',
                'gallery'      => ['assets/images/p-office-02.jpg', 'assets/images/p-office-03.jpg'],
            ],
            [
                'category'     => 'Office',
                'title'        => 'DPR Staff Working Room',
                'client_name'  => 'Sekretariat DPR RI',
                'location'     => 'Senayan, Jakarta Pusat',
                'project_type' => 'Open Plan Workstation',
                'room_type'    => 'Office Room',
                'design_style' => 'Ergonomic Modern',
                'year'         => 2023,
                'description'  => 'Ruang kerja staf terbuka dengan meja workstation ergonomis, partisi akustik peredam suara, dan sistem cable management rapi.',
                'main_image'   => 'assets/images/p-office-02.jpg',
                'gallery'      => ['assets/images/p-office-01.jpg', 'assets/images/p-office-04.jpg'],
            ],
            [
                'category'     => 'Office',
                'title'        => 'Reception PT Momodis Jakarta',
                'client_name'  => 'PT Momodis',
                'location'     => 'Jakarta Barat',
                'project_type' => 'Corporate Reception',
                'room_type'    => 'Reception Area',
                'design_style' => 'Corporate Minimalist',
                'year'         => 2022,
                'description'  => 'Area resepsionis korporat yang memberikan impresi profesional bagi tamu perusahaan. Meja resepsionis custom lengkung dengan backdrop logo backlit.',
                'main_image'   => 'assets/images/p-office-03.jpg',
                'gallery'      => ['assets/images/p-office-01.jpg', 'assets/images/p-office-02.jpg'],
            ],
            [
                'category'     => 'Office',
                'title'        => 'NCS POLRI Cyber Crime Room',
                'client_name'  => 'DITTIPIDSIBER POLRI',
                'location'     => 'Jakarta Selatan',
                'project_type' => 'Conference & Command Room',
                'room_type'    => 'Meeting Room',
                'design_style' => 'Hi-Tech Professional',
                'year'         => 2023,
                'description'  => 'Ruang rapat strategis dan command center dengan meja konferensi oval berkapasitas 20 orang, wall display video, dan panel dinding akustik.',
                'main_image'   => 'assets/images/p-office-04.jpg',
                'gallery'      => ['assets/images/p-office-02.jpg', 'assets/images/p-office-03.jpg'],
            ],
        ];

        foreach ($portfolios as $p) {
            $portfolio = Portfolio::updateOrCreate(
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
                    'main_image'            => $p['main_image'],
                    'status'                => 'published',
                ]
            );

            // Seed galeri gambar
            if (!empty($p['gallery'])) {
                foreach ($p['gallery'] as $galleryImg) {
                    PortfolioImage::firstOrCreate([
                        'portfolio_id' => $portfolio->id,
                        'image'        => $galleryImg,
                    ]);
                }
            }
        }
    }
}
