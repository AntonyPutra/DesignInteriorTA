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
        'hide_client_name',
        'location',
        'project_type',
        'room_type',
        'design_style',
        'description',
        'year',
        'main_image',
        'status',
    ];

    protected $casts = [
        'hide_client_name' => 'boolean',
    ];

    /**
     * Nama klien untuk tampilan publik: null jika kosong, atau disensor '***' jika privasi NDA diaktifkan.
     */
    public function getPublicClientNameAttribute(): ?string
    {
        $name = trim((string) ($this->client_name ?? ''));
        if ($name === '') {
            return null;
        }

        return $this->hide_client_name ? '***' : $name;
    }

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
     * Accessor untuk URL gambar utama yang cerdas dan fallback resolusi tinggi.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->main_image) {
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->main_image)) {
                return \Illuminate\Support\Facades\Storage::url($this->main_image);
            }
            if (file_exists(public_path($this->main_image))) {
                return asset($this->main_image);
            }
        }

        $titleLower = strtolower($this->title ?? '');
        $catLower = strtolower($this->category?->slug ?? $this->category?->name ?? '');

        if (str_contains($titleLower, 'master bedroom')) return asset('assets/images/p-landed-03.jpg');
        if (str_contains($titleLower, 'full house')) return asset('assets/images/p-landed-05.jpg');
        if (str_contains($titleLower, 'kitchen')) return asset('assets/images/p-landed-01.jpg');
        if (str_contains($titleLower, 'kopi') || str_contains($titleLower, 'coffee') || str_contains($titleLower, 'cafe')) return asset('assets/images/p-fnb-02.jpg');
        if (str_contains($titleLower, 'apartment') || str_contains($titleLower, 'pent house') || str_contains($titleLower, 'studio')) return asset('assets/images/p-apartment-03.jpg');
        if (str_contains($titleLower, 'office') || str_contains($titleLower, 'dpr') || str_contains($titleLower, 'lobby')) return asset('assets/images/p-office-01.jpg');
        if (str_contains($titleLower, 'booth') || str_contains($titleLower, 'power')) return asset('assets/images/p-booth-02.jpg');

        if (str_contains($catLower, 'landed')) return asset('assets/images/p-landed-02.jpg');
        if (str_contains($catLower, 'apart')) return asset('assets/images/p-apartment-01.jpg');
        if (str_contains($catLower, 'f&b') || str_contains($catLower, 'fnb') || str_contains($catLower, 'commercial')) return asset('assets/images/p-fnb-01.jpg');
        if (str_contains($catLower, 'office')) return asset('assets/images/p-office-02.jpg');
        if (str_contains($catLower, 'booth')) return asset('assets/images/p-booth-01.jpg');

        return asset('assets/images/cover-armchair.jpg');
    }
}
