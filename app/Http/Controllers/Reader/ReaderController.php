<?php

namespace App\Http\Controllers\Reader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index()
    {
        return view('reader.dashboard');
    }
}
