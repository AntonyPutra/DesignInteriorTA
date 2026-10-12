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
     * Otomatis sertakan atribut ini ke JSON / API.
     */
    protected $appends = [
        'logo_url',
    ];

    /**
     * Accessor: Full URL logo perusahaan.
     */
    public function getLogoUrlAttribute(): string
    {
        if ($this->logo) {
            if (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://')) {
                return $this->logo;
            }

            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->logo)) {
                return asset('storage/' . ltrim($this->logo, '/'));
            }

            if (file_exists(public_path($this->logo))) {
                return asset($this->logo);
            }
        }

        return asset('assets/images/logo-mark.png');
    }

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
