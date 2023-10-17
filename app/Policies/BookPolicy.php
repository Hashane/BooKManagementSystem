<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Book;
use App\Models\BookAssignment;

class BookPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Book $book)
    {
        // Check if the user is a reader
        if ($user->hasRole('reader')) {
            // Check if the book is assigned to the user
            return BookAssignment::where('book_id', $book->id)
                ->where('user_id', $user->id)
                ->exists();
        }

        // Allow admins, editors, and viewers to view books
        return true;
    }
}
