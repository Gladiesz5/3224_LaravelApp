<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    #fillable = field tersebut boleh diisi mass assignment.
    protected $fillable = [
        'name',
        'logo_url'
    ];
}