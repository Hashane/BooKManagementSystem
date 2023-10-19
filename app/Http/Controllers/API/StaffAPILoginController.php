<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Staff;

class StaffAPILoginController extends Controller
{
    public function staffLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('staff')->user();

            // Retrieve the user's permissions
            $permissions = $user->getAllPermissions();

            // Extract permission names and use them as scopes
            $scopes = $permissions->pluck('name')->toArray();
            $scopes = array_map('trim', $scopes);

            // Create a token with the dynamically generated scopes
            $token = $user->createToken('MyToken', $scopes);

            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
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

    public function updateBook(Request $request, $id)
    {
        // Find the book by its ID
        $book = Book::find($id);

        // Check if the book exists
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        // Validation rules for updating
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
            return response()->json(['error' => $validator->errors()], 400); // 400 for Bad Request
        }

        // Update the book's attributes with the new values
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->genre = $request->input('genre');
        $book->publication_year = $request->input('publication_year');
        $book->description = $request->input('description');
        $book->count = $request->input('count');

        // Save the updated book
        if ($book->save()) {
            return response()->json(['book' => $book], 200); // 200 for OK
        } else {
            return response()->json(['error' => 'Book could not be updated'], 500); // 500 for Internal Server Error
        }
    }

    public function destroyBook(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 200);
    }

    public function getUsers()
    {
        $staffs = Staff::all();
        return response()->json($staffs);
    }

    public function getReaders()
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
}
