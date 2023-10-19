<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Book;


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

    public function staffDashboard()
    {
        return response()->json(Auth::guard('staff')->user());
    }
}
