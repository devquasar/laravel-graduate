<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'author',
        'name',
        'house',
        'date',
        'page',
        'image',
    ];
}
