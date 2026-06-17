<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    protected static function booted(): void
    {
        static::creating(function (PortfolioCategory $category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    /**
     * Relasi: satu kategori punya banyak portofolio.
     */
    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class, 'portfolio_category_id');
    }

    /**
     * Scope: hanya kategori aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
