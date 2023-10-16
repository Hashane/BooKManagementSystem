<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Common dashboard accessible to both 'staff' and 'reader' users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Book management routes restricted to 'staff' users
Route::prefix('books')->group(function () {
    Route::get('/index', function () {
        return view('books.index');
    })->middleware('auth:staff'); // Restrict access to 'staff' users

    Route::get('/edit', function () {
        return view('books.edit');
    })->middleware('auth:staff'); // Restrict access to 'staff' users

    Route::get('/create', function () {
        return view('books.create');
    })->middleware('auth:staff'); // Restrict access to 'staff' users
});

// 'reader' user-specific routes
Route::get('/borrowed-books', function () {
    return view('borrowed_books');
})->middleware('auth:reader'); // Restrict access to 'reader' users

Route::get('/history', function () {
    return view('history');
})->middleware('auth:reader'); // Restrict access to 'reader' users