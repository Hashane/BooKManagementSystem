<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
}
