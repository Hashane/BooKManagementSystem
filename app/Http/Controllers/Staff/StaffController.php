<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
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
}
