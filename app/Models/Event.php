<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Transaction;

class Event extends Model
{
    /**
     * Field yang boleh diisi (Mass Assignment)
     */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'date',
        'location',
        'price',
        'stock',
        'poster_path',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * Relasi ke Category
     * Satu Event dimiliki satu Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke Rating
     * Satu Event memiliki banyak Rating
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Relasi ke Transaction
     * Satu Event memiliki banyak Transaksi
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Menghitung rata-rata rating otomatis
     */
    public function getAverageRatingAttribute()
    {
        return round($this->ratings()->avg('rating'), 1);
    }

    /**
     * Menghitung jumlah rating
     */
    public function getTotalRatingAttribute()
    {
        return $this->ratings()->count();
    }
}