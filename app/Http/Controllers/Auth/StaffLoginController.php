<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    public function logout(Request $request)
    {
        // Log out from the 'staff' guard
        Auth::guard('staff')->logout();

        // Log out from the 'reader' guard
        Auth::guard('reader')->logout();
        $request->session()->invalidate();

        return redirect('/staff/login'); // Redirect to the staff login page
    }
}
