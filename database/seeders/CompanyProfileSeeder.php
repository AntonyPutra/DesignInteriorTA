<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        CompanyProfile::updateOrCreate(
            ['id' => 1],
            [
                'company_name'      => 'PT Pratama Berkah Utama',
                'brand_name'        => 'Pratama Design Studio',
                'short_description' => 'Interior & exterior design & build company based in Jakarta, Indonesia.',
                'about_description' => 'Pratama Design Studio adalah perusahaan desain interior dan eksterior yang berdiri sejak tahun 2021, berlokasi di Jakarta, Indonesia. Kami berkomitmen untuk menghadirkan solusi desain yang estetis, fungsional, dan sesuai dengan kebutuhan serta budget klien. Dengan pengalaman menangani berbagai proyek mulai dari residential, F&B, office, hingga booth, kami siap mewujudkan ruang impian Anda menjadi kenyataan.',
                'vision'            => 'Menjadi perusahaan desain interior terpercaya yang tidak hanya mengutamakan estetika, tetapi juga fungsionalitas ruang bagi pemiliknya.',
                'mission'           => 'Memahami kebutuhan klien secara mendalam dan menerjemahkannya menjadi desain yang menarik, praktis, fungsional, serta sesuai dengan budget yang tersedia.',
                'address'           => 'Puri Orchard Apt. Orange Grove 21/09, Jakarta, Indonesia',
                'whatsapp'          => '+6282213641995',
                'email'             => 'pratamadsb@gmail.com',
                'website'           => 'pratamadesign.com',
                'instagram'         => 'pratamaid.studio',
                'footer_text'       => '© ' . date('Y') . ' Pratama Design Studio. All Rights Reserved.',
            ]
        );
    }
}
