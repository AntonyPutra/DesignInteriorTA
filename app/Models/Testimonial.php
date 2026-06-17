<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'project_name',
        'rating',
        'message',
        'image',
        'status',
    ];

    /**
     * Scope: hanya testimoni aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Render bintang rating sebagai string bintang unicode.
     */
    public function starsHtml(): string
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= $i <= $this->rating ? '★' : '☆';
        }
        return $stars;
    }
}
