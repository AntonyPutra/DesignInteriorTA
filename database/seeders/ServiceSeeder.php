<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name'        => 'Fit-Out Consultation',
                'icon'        => 'chat-bubble-left-right',
                'description' => 'Layanan konsultasi untuk membantu klien merencanakan ruang berdasarkan kebutuhan, budget, dan hasil pengukuran lokasi. Kami memberikan rekomendasi desain, material, dan estimasi biaya secara profesional sebelum proses dimulai.',
            ],
            [
                'name'        => 'Project Plan and Schedule',
                'icon'        => 'calendar-days',
                'description' => 'Layanan penyusunan rencana kerja dan jadwal proyek yang terstruktur agar proses pengerjaan lebih terarah, tepat waktu, dan sesuai target yang telah disepakati bersama klien.',
            ],
            [
                'name'        => 'Project Budgeting',
                'icon'        => 'calculator',
                'description' => 'Layanan pengelolaan dan perhitungan anggaran proyek secara transparan agar kualitas hasil tetap terjaga sesuai dengan budget yang dimiliki klien, tanpa biaya tersembunyi.',
            ],
            [
                'name'        => 'Digital Project Rendering',
                'icon'        => 'computer-desktop',
                'description' => 'Layanan visualisasi desain 3D berkualitas tinggi sebelum proses konstruksi atau produksi dimulai. Klien dapat melihat gambaran nyata ruangan sebelum eksekusi dilakukan.',
            ],
            [
                'name'        => 'Production Process',
                'icon'        => 'wrench-screwdriver',
                'description' => 'Proses pembuatan elemen interior custom di workshop kami sendiri, mulai dari furniture, kitchen set, hingga elemen dekorasi, dengan standar kualitas dan presisi tinggi.',
            ],
            [
                'name'        => 'Fit Out and Renovation',
                'icon'        => 'home-modern',
                'description' => 'Proses pelaksanaan desain yang telah disetujui menjadi ruang yang fungsional dan estetis. Kami menangani seluruh proses fit-out dan renovasi dari awal hingga selesai.',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => Str::slug($service['name'])],
                array_merge($service, [
                    'slug'   => Str::slug($service['name']),
                    'status' => 'active',
                ])
            );
        }
    }
}
