<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReaderLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/reader/dashboard'; // Redirect after successful login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.reader-login');
    }

    protected function guard()
    {
        return Auth::guard('reader');
    }

    public function logout(Request $request)
    {
        // Log out from the 'reader' guard
        Auth::guard('reader')->logout();
        $request->session()->invalidate();

        return redirect('/reader/login'); // Redirect to the reader login page
    }
}
