<?php

use App\Http\Controllers\Auth\ReaderLoginController;
use App\Http\Controllers\Auth\StaffLoginController;
use App\Http\Controllers\Reader\ReaderController;
use App\Http\Controllers\Staff\StaffController;
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


// Staff login routes
Route::get('staff/login', [StaffLoginController::class, 'showLoginForm'])->name('staff.login');
Route::post('staff/login', [StaffLoginController::class, 'login']);

// Reader login routes
Route::get('reader/login', [ReaderLoginController::class, 'showLoginForm'])->name('reader.login');
Route::post('reader/login', [ReaderLoginController::class, 'login']);


Route::middleware(['auth:staff'])->group(function () {
    // Routes for "staff" guard
    Route::get('/staff/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
    // Add more routes specific to the "staff" guard
});

Route::middleware(['auth:reader'])->group(function () {
    // Routes for "reader" guard
    Route::get('/reader/dashboard', [ReaderController::class, 'index'])->name('reader.dashboard');
    // Add more routes specific to the "reader" guard
});


// 'reader' user-specific routes
Route::get('/borrowed-books', function () {
    return view('borrowed_books');
})->middleware('auth:reader'); // Restrict access to 'reader' users

Route::get('/history', function () {
    return view('history');
})->middleware('auth:reader'); // Restrict access to 'reader' users