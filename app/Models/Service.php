<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'image',
        'status',
    ];

    /**
     * Auto-generate slug from name before creating.
     */
    protected static function booted(): void
    {
        static::creating(function (Service $service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });

        static::updating(function (Service $service) {
            if ($service->isDirty('name') && !$service->isDirty('slug')) {
                $service->slug = Str::slug($service->name);
            }
        });
    }

    /**
     * Otomatis sertakan atribut ini ke JSON / API.
     */
    protected $appends = [
        'image_url',
    ];

    /**
     * Scope: hanya layanan aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Accessor: Full URL gambar layanan.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                return $this->image;
            }

            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->image)) {
                return asset('storage/' . ltrim($this->image, '/'));
            }

            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }
        }

        $fallbacks = [
            1 => 'assets/images/service-01.jpg',
            2 => 'assets/images/service-02.jpg',
            3 => 'assets/images/service-03.jpg',
        ];

        return asset($fallbacks[$this->id] ?? 'assets/images/service-01.jpg');
    }
}
