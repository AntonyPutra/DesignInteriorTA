<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@pratamaid.com'],
            [
                'name'              => 'Admin Pratama',
                'email'             => 'admin@pratamaid.com',
                'password'          => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // Run seeders in order
        $this->call([
            CompanyProfileSeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
            TestimonialSeeder::class,
            ConsultationSeeder::class,
        ]);
    }
}
