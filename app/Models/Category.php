<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    #fillable = field tersebut boleh diisi mass assignment.
     protected $fillable = ['name', 'slug'];

    public function events()
    {
        #satu kategori bisa memiliki banyak event.
        return $this->hasMany(Event::class);
    }

}
