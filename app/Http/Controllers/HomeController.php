<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        // Get the user's role using Spatie
        $role = $user->getRoleNames()->toArray();

        if (in_array('admin', $role)) {
            return view('staff.dashboard'); // Load the Admin Dashboard view
        } elseif (in_array('viewer', $role)) {
            return view('viewer.dashboard'); // Load the Viewer Dashboard view
        } elseif (in_array('editor', $role)) {
            return view('editor.dashboard'); // Load the Editor Dashboard view
        } elseif (in_array('reader', $role)) {
            return view('reader.dashboard'); // Load the Reader Dashboard view
        } else {
            return view('auth.login');
        }
    }
}
