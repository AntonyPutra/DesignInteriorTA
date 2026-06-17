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
}
