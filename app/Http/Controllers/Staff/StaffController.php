<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookAssignment;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    protected function guard()
    {
        return Auth::guard('staff'); // Use the "staff" guard
    }

    public function index()
    {
        return view('staff.dashboard');
    }

    public function showBorrowed()
    {
        $assignedBooks = BookAssignment::with(['book', 'reader'])->get();

        return view('books.borrowed', compact('assignedBooks'));
    }
}
