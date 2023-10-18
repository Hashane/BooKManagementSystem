<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookAssignment;
use App\Models\Reader;
use Illuminate\Support\Facades\Auth;

class ReaderController extends Controller
{
    public function index()
    {
        //user id of the logged in reader
        $readerId = auth('reader')->id();

        //get reader details
        $reader =  Reader::find($readerId);

        //using reader info we invoke assignedBooks relationship 
        $assignments = $reader->assignedBooks;

        return view('reader.dashboard', compact('assignments'));
    }

    /**
     * Display the specified resource.
     */
    public function showBook(string $id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }
}
