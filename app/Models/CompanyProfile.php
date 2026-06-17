<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'brand_name',
        'short_description',
        'about_description',
        'vision',
        'mission',
        'address',
        'whatsapp',
        'email',
        'website',
        'instagram',
        'logo',
        'footer_text',
    ];

    /**
     * Get the singleton company profile (always ID 1).
     */
    public static function getInstance(): self
    {
        return self::firstOrCreate(['id' => 1], [
            'company_name'      => 'PT Pratama Berkah Utama',
            'brand_name'        => 'Pratama Design Studio',
            'short_description' => 'Interior & exterior design & build company based in Jakarta, Indonesia.',
        ]);
    }
}
