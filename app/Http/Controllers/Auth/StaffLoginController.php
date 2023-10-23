<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Staff;
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

    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['active' => 1]);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        // Load user from database
        $user = Staff::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
            $errors = [$this->username() => trans('auth.inactive')];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }


    public function logout(Request $request)
    {
        // Log out from the 'staff' guard
        Auth::guard('staff')->logout();
        $request->session()->invalidate();
        return redirect('/staff/login'); // Redirect to the staff login page
    }
}
