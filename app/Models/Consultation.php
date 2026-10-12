<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'whatsapp',
        'email',
        'project_location',
        'project_type',
        'room_type',
        'area_size',
        'estimated_budget',
        'design_style',
        'message',
        'reference_file',
        'status',
    ];

    /**
     * Otomatis sertakan kode tiket unik acak ke JSON / API.
     */
    protected $appends = [
        'ticket_code',
    ];

    /**
     * Kode unik tiket konsultasi acak anti-intip (contoh: PRT-8A2F9C).
     */
    public function getTicketCodeAttribute(): string
    {
        return 'PRT-' . strtoupper(substr(md5($this->id . 'pratama_salt_2026'), 0, 6));
    }

    /**
     * Status badge color helper.
     */
    public function statusBadgeClass(): string
    {
        return match($this->status) {
            'pending'   => 'badge-pending',
            'contacted' => 'badge-contacted',
            'scheduled' => 'badge-scheduled',
            'finished'  => 'badge-finished',
            'cancelled' => 'badge-cancelled',
            default     => 'badge-pending',
        };
    }

    /**
     * Label status dalam Bahasa Indonesia.
     */
    public function statusLabel(): string
    {
        return match($this->status) {
            'pending'   => 'Menunggu',
            'contacted' => 'Dihubungi',
            'scheduled' => 'Terjadwal',
            'finished'  => 'Selesai',
            'cancelled' => 'Dibatalkan',
            default     => 'Menunggu',
        };
    }

    /**
     * Format WhatsApp link.
     */
    public function whatsappLink(): string
    {
        $number = preg_replace('/[^0-9]/', '', $this->whatsapp);
        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }
        return 'https://wa.me/' . $number;
    }

    /**
     * Scope: filter berdasarkan status.
     */
    public function scopeByStatus($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query;
    }
}
