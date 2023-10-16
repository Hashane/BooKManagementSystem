<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class StaffLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/staff/dashboard'; // Redirect after successful login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.staff-login');
    }

    protected function guard()
    {
        return Auth::guard('staff');
    }
}
