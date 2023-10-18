<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Mail\BookAssigned;
use App\Models\Book;
use App\Models\BookAssignment;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function showAssign($id)
    {
        $book = Book::find($id);
        $copiesAvailable = $book->bookCopies->where('status', '1');
        $availableCopiesCount = count($copiesAvailable);
        $readers = Reader::all();

        return view('books.assign', compact('book', 'readers', 'availableCopiesCount'));
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

        //make specific copy unavailable
        $firstAvailableCopy = $book->bookCopies->where('status', '1')->first();
        $firstAvailableCopy->status = 0;

        if ($book->save() && $firstAvailableCopy->save()) :
            // Send the email
            $reader =  Reader::find($readerId);
            Mail::to($reader->email)->send(new BookAssigned($book, $dueDate));
            return redirect()->route('books.show', $book->id)->with('success', 'Book assigned successfully');
        else :
            return redirect()->route('books.show', $book->id)->with('error', 'Failed! Try again');
        endif;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required',
            'publication_year' => 'required|integer',
            'description' => 'nullable|max:500',
            'count' => 'required|integer',
        ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->genre = $request->input('genre');
        $book->publication_year = $request->input('publication_year');
        $book->description = $request->input('description');
        $book->count = $request->input('count');

        if ($book->save()) {
            return redirect()->route('books.show', $book->id)->with('success', 'Book created successfully');
        } else {
            return redirect()->route('books.create')->with('error', 'Failed! Try again');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        $totalCopies = $book->bookCopies;
        $copiesAvailable = $totalCopies->where('status', '1');

        $availableCopiesCount = count($copiesAvailable);
        $totalCopiesCount = count($totalCopies);

        return view('books.show', compact('book', 'availableCopiesCount', 'totalCopiesCount'));
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
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required',
            'year' => 'required|integer',
            'description' => 'nullable|max:500',
        ]);

        $book = Book::find($id);

        if ($book) {
            $book->title = $request->input('title');
            $book->author = $request->input('author');
            $book->genre = $request->input('genre');
            $book->publication_year = $request->input('year');
            $book->description = $request->input('description');
            //$book->count = $request->input('count');
            if ($book->save())
                return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully');
            else
                return redirect()->route('books.show', $book->id)->with('error', 'Failed! Try again');
        } else
            return redirect()->route('books.show', $book->id)->with('error', 'Failed! Try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        $books = Book::all();
        if ($book) {
            $book->delete();
            return redirect()->route('books.index', compact('books'))->with('success', 'Book deleted successfully');
        } else {
            return redirect()->route('books.index', compact('books'))->with('error', 'Book could not be deleted');
        }
    }
}
