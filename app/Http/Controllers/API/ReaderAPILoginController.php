<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reader;

class ReaderAPILoginController extends Controller
{
    public function readerLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);
        }

        if (Auth::guard('reader')->attempt(['email' => $request->email, 'password' => $request->password])) {

            config(['auth.guards.api.provider' => 'reader']);

            $token = Auth::guard('reader')->user()->createToken('MyApp', ['reader'])->accessToken;

            return response()->json(['token' => $token], 200);
        } else {

            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    public function readerDashboard()
    {
        return response()->json(Auth::guard('reader')->user());
    }

    public function getUsers()
    {
        $readers = Reader::all();
        return response()->json($readers);
    }

    public function getBooks()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function findBook(string $id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }


    public function createBook(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required',
            'publication_year' => 'required|integer',
            'description' => 'nullable|max:500',
            'count' => 'required|integer',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400); // Use 400 for Bad Request
        }

        // Create a new book instance and populate its attributes
        $book = new Book([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'genre' => $request->input('genre'),
            'publication_year' => $request->input('publication_year'),
            'description' => $request->input('description'),
            'count' => $request->input('count'),
        ]);

        // Save the book to the database
        if ($book->save()) {
            return response()->json(['book' => $book], 201); // Use 201 for Created
        } else {
            return response()->json(['error' => 'Book could not be created.'], 500); // Use 500 for Internal Server Error
        }
    }
}
