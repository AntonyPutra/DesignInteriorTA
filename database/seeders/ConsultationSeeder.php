<?php

namespace Database\Seeders;

use App\Models\Consultation;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    public function run(): void
    {
        $consultations = [
            [
                'name'             => 'Siti Nurhaliza',
                'whatsapp'         => '081234567890',
                'email'            => 'siti@email.com',
                'project_location' => 'Serpong, Tangerang Selatan',
                'project_type'     => 'Rumah',
                'room_type'        => 'Kitchen Set',
                'area_size'        => 12.0,
                'estimated_budget' => 'Rp 30 - 50 Juta',
                'design_style'     => 'Modern Minimalist',
                'message'          => 'Saya ingin membuat kitchen set untuk dapur rumah baru saya. Ukuran sekitar 3x4m.',
                'status'           => 'pending',
            ],
            [
                'name'             => 'Reza Fahlevi',
                'whatsapp'         => '082345678901',
                'email'            => 'reza@email.com',
                'project_location' => 'Kelapa Gading, Jakarta Utara',
                'project_type'     => 'Apartemen',
                'room_type'        => 'Full House',
                'area_size'        => 45.0,
                'estimated_budget' => 'Rp 150 - 200 Juta',
                'design_style'     => 'Japandi',
                'message'          => 'Apartemen 2 bedroom mau didesain ulang dengan konsep Japandi. Ada anggaran sekitar 150-200 juta.',
                'status'           => 'contacted',
            ],
            [
                'name'             => 'Maya Indah',
                'whatsapp'         => '083456789012',
                'email'            => 'maya@email.com',
                'project_location' => 'Bintaro, Tangerang Selatan',
                'project_type'     => 'Café/Restaurant',
                'room_type'        => 'F&B Space',
                'area_size'        => 80.0,
                'estimated_budget' => 'Rp 300 - 500 Juta',
                'design_style'     => 'Modern Industrial',
                'message'          => 'Mau buka coffee shop dengan tema industrial. Lokasi di ruko 2 lantai sekitar 80m2.',
                'status'           => 'scheduled',
            ],
            [
                'name'             => 'Denny Herlambang',
                'whatsapp'         => '084567890123',
                'email'            => 'denny@email.com',
                'project_location' => 'Bekasi Barat',
                'project_type'     => 'Rumah',
                'room_type'        => 'Full House',
                'area_size'        => 120.0,
                'estimated_budget' => 'Rp 400 - 600 Juta',
                'design_style'     => 'Modern Contemporary',
                'message'          => 'Rumah baru 2 lantai mau di-fit-out full. Budget sekitar 400-600 juta.',
                'status'           => 'finished',
            ],
            [
                'name'             => 'Lia Permata',
                'whatsapp'         => '085678901234',
                'email'            => null,
                'project_location' => 'Kemang, Jakarta Selatan',
                'project_type'     => 'Office',
                'room_type'        => 'Office Room',
                'area_size'        => 60.0,
                'estimated_budget' => 'Rp 200 - 300 Juta',
                'design_style'     => 'Modern Professional',
                'message'          => 'Butuh desain ulang kantor startup kami sekitar 60m2.',
                'status'           => 'cancelled',
            ],
        ];

        foreach ($consultations as $c) {
            Consultation::create($c);
        }
    }
}
