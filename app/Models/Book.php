<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'genre',
        'publication_year',
        'description',
        'count',
    ];

    protected $guarded = [];

    public function bookCopies()
    {
        return $this->hasMany(BookCopy::class);
    }

    public function assignments()
    {
        return $this->hasMany(BookAssignment::class, 'book_id');
    }
}
