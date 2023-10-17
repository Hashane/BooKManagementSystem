<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function assignments()
    {
        return $this->morphMany(Assignment::class, 'assignable');
    }
}
