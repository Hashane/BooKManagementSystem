<?php

namespace App\Http\Controllers\Staff;

use App\Models\Book;
use App\Models\BookAssignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowBooksController extends Controller
{
    public function returnForm(BookAssignment $bookAssignment)
    {
        return view('books.return-form', compact('bookAssignment'));
    }

    public function returnBook(Request $request, BookAssignment $bookAssignment)
    {
        // Retrieve the book based on the provided $id
        $book = Book::find($bookAssignment->book_id);

        // Perform logic to mark the book as returned, e.g., update the 'is_returned' column.
        $bookAssignment->where('book_id', $bookAssignment->book_id)->update([
            'returned' => true,
        ]);

        // Update the book's available copies count
        $book->count -= 1;

        if ($book->save()) :
            return redirect()->route('staff.borrowed-books', $book->id)->with('success', 'Book returned successfully');
        else :
            return redirect()->route('staff.borrowed-books', $book->id)->with('success', 'Failed! Try again');
        endif;
    }
}
