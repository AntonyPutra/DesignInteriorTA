<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'image',
        'caption',
    ];

    /**
     * Otomatis sertakan atribut ini ke JSON / API.
     */
    protected $appends = [
        'image_url',
    ];

    /**
     * Relasi: gambar belongs to portfolio.
     */
    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

    /**
     * Accessor: Full URL gambar galeri.
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

        return asset('assets/images/hero-living.jpg');
    }
}
