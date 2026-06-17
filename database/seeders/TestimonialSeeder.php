<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name'  => 'Budi Santoso',
                'project_name' => 'Kitchen Set PIK',
                'rating'       => 5,
                'message'      => 'Sangat puas dengan hasilnya! Tim Pratama Design Studio sangat profesional dan memahami keinginan kami. Kitchen set yang dibuat melebihi ekspektasi dari segi kualitas dan desain. Highly recommended!',
            ],
            [
                'client_name'  => 'Rina Marlina',
                'project_name' => 'Full House Jelambar',
                'rating'       => 5,
                'message'      => 'Rumah kami benar-benar berubah total! Desainnya modern dan fungsional sesuai kebutuhan keluarga. Proses pengerjaannya tepat waktu dan tim sangat responsif. Terima kasih Pratama Design Studio!',
            ],
            [
                'client_name'  => 'Andika Putra',
                'project_name' => 'Apartment Studio Bekasi',
                'rating'       => 5,
                'message'      => 'Konsep Japandi yang diusulkan Pratama pas banget sama selera saya. Apartemen studio jadi terasa lebih luas dan tenang. Kualitas material dan pengerjaan sangat memuaskan!',
            ],
            [
                'client_name'  => 'KATA Kopi Team',
                'project_name' => 'KATA Kopi PIK',
                'rating'       => 5,
                'message'      => 'Desain coffee shop kami mendapat banyak pujian dari pelanggan. Pratama Design Studio berhasil mewujudkan konsep industrial yang kami inginkan dengan sempurna. Pelanggan betah berlama-lama di sini!',
            ],
            [
                'client_name'  => 'Dewi Rahayu',
                'project_name' => 'Master Bedroom Cengkareng',
                'rating'       => 4,
                'message'      => 'Kamar tidur utama saya sekarang terlihat mewah dan elegan. Tim sangat sabar dalam mendengarkan kebutuhan kami dan memberikan saran yang tepat. Hasil akhirnya sangat memuaskan!',
            ],
            [
                'client_name'  => 'Hendra Wijaya',
                'project_name' => 'Office Interior Jakarta',
                'rating'       => 5,
                'message'      => 'Office kami sekarang jauh lebih nyaman dan modern. Tim Pratama sangat profesional dalam mengerjakan proyek kantor kami. Karyawan pun lebih semangat bekerja dengan lingkungan yang baru!',
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create(array_merge($t, ['status' => 'active']));
        }
    }
}
