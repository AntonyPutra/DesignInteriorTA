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
     * Relasi: gambar belongs to portfolio.
     */
    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
}
