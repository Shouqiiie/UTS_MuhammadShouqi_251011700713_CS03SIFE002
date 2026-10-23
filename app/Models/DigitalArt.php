<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalArt extends Model
{
    use HasFactory;

    protected $table = 'digital_art';

    protected $fillable = [
        'title',
        'artist',
        'resolution',
        'price',
        'image',
        'software_used',
        'description',
    ];

    /**
     * Get formatted price in Indonesian Rupiah (IDR).
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Get image asset URL.
     */
    public function getImageUrlAttribute(): string
    {
        return asset('assets/images/' . $this->image);
    }
}
