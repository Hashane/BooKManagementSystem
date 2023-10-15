<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends User
{
    use HasFactory;

    protected $fillable = [
        'favorite_genre',
        'reading_level',
        'last_book',
    ];
}
