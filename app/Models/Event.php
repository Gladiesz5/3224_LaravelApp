<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    #fillable = field tersebut boleh diisi mass assignment.
    protected $fillable = [
        'category_id', 'title', 'description', 'date',
        'location', 'price', 'stock', 'poster_path'
        ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function category()
    {
        #satu event hanya memiliki satu kategori.
        return $this->belongsTo(Category::class);
    }
        
}
