<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookAssignment;
use App\Models\Reader;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showAssign($id)
    {
        $book = Book::find($id);
        $readers = Reader::all();

        return view('books.assign', compact('book', 'readers'));
    }

    public function doAssign(Request $request, $id)
    {
        // Retrieve the book based on the provided $id
        $book = Book::find($id);

        // Validate the form data
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'due_date' => 'required|date',
        ]);

        // Retrieve the reader and due date from the request
        $readerId = $request->input('reader_id');
        $dueDate = $request->input('due_date');

        // Create a new assignment record
        $assignment = new BookAssignment();
        $assignment->book_id = $book->id;
        $assignment->reader_id = $readerId;
        $assignment->returned = false;
        $assignment->due_date = $dueDate;
        $assignment->save();

        // Update the book's available copies count
        $book->count -= 1;
        if ($book->save()) :
            return redirect()->route('books.show', $book->id)->with('success', 'Book assigned successfully');
        else :
            return redirect()->route('books.show', $book->id)->with('success', 'Failed! Try again');
        endif;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all(); // Replace 'Book' with your actual model name
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
