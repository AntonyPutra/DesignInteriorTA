<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'portfolio_category_id',
        'title',
        'slug',
        'client_name',
        'location',
        'project_type',
        'room_type',
        'design_style',
        'description',
        'year',
        'main_image',
        'status',
    ];

    protected static function booted(): void
    {
        static::creating(function (Portfolio $portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });

        static::updating(function (Portfolio $portfolio) {
            if ($portfolio->isDirty('title') && !$portfolio->isDirty('slug')) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });
    }

    /**
     * Relasi: portofolio belongs to kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }

    /**
     * Relasi: portofolio punya banyak gambar galeri.
     */
    public function images(): HasMany
    {
        return $this->hasMany(PortfolioImage::class, 'portfolio_id');
    }

    /**
     * Scope: hanya portofolio yang dipublikasi.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Accessor: URL gambar utama (Storage disk public atau fallback aset berkualitas).
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->main_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->main_image)) {
            return \Illuminate\Support\Facades\Storage::url($this->main_image);
        }

        $fallbacks = [
            1 => 'assets/images/p-landed-03.jpg',    // Kitchen Set PIK
            2 => 'assets/images/p-landed-02.jpg',    // Master Bedroom Cengkareng
            3 => 'assets/images/p-landed-01.jpg',    // Full House Jelambar
            4 => 'assets/images/p-apartment-01.jpg', // Apartment Studio Bekasi
            5 => 'assets/images/p-fnb-01.jpg',       // KATA Kopi PIK
            6 => 'assets/images/p-office-01.jpg',    // Office Interior Jakarta
        ];

        return asset($fallbacks[$this->id] ?? 'assets/images/hero-living.jpg');
    }

    /**
     * Helper untuk mengambil gambar hero header dari database (dengan fallback).
     */
    public static function getHeaderImage(?string $keyword = null): string
    {
        $query = static::query();

        if ($keyword) {
            $matched = (clone $query)->where(function ($q) use ($keyword) {
                $q->where('slug', 'like', "%{$keyword}%")
                  ->orWhere('title', 'like', "%{$keyword}%")
                  ->orWhere('room_type', 'like', "%{$keyword}%")
                  ->orWhere('project_type', 'like', "%{$keyword}%");
            })->first();

            if ($matched) {
                return $matched->image_url;
            }
        }

        $any = $query->first();
        if ($any) {
            return $any->image_url;
        }

        return asset('assets/images/hero-living.jpg');
    }
}
