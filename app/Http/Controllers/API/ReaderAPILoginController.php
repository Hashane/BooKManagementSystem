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
            $user = Auth::guard('reader')->user();

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
}
