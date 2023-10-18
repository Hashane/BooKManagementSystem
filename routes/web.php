<?php

use App\Http\Controllers\Auth\ReaderLoginController;
use App\Http\Controllers\Auth\StaffLoginController;
use App\Http\Controllers\BorrowBooksController;
use App\Http\Controllers\Reader\ReaderController;
use App\Http\Controllers\Staff\BookController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;


// Redirect authenticated users away from these routes.
Route::middleware(['guest:web', 'preventBack'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});


// Redirect authenticated users away from these routes.
Route::middleware(['guest:staff', 'preventBack'])->group(function () {
    Route::get('staff/login', [StaffLoginController::class, 'showLoginForm'])->name('staff.login');
    Route::post('staff/login', [StaffLoginController::class, 'login']);
    //Route::post('staff/logout', [StaffLoginController::class, 'logout'])->name('staff.logout');
});
Route::middleware(['guest:reader', 'preventBack'])->group(function () {
    Route::get('reader/login', [ReaderLoginController::class, 'showLoginForm'])->name('reader.login');
    Route::post('reader/login', [ReaderLoginController::class, 'login']);
    //  Route::post('reader/logout', [ReaderLoginController::class, 'logout'])->name('reader.logout');
});

// Admin Dashboard Routes
Route::middleware(['auth:staff', 'role:admin', 'preventBack'])->group(function () {
    Route::get('/staff/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/staff/books', [BookController::class, 'store'])->name('books.store');
    Route::delete('/staff/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::get('/staff/borrowed-books', [StaffController::class, 'showBorrowed'])->name('staff.borrowed-books');
    Route::get('/staff/borrowing-history', [StaffController::class, 'borrowingHistory'])->name('staff.borrowing-history');

    Route::get('/staff/manage-users', [UserManagementController::class, 'index'])->name('staff.manage-users');
    Route::post('/staff/manage-users', [UserManagementController::class, 'activateUsers']);

    Route::get('/books/{bookAssignment}/return', [BorrowBooksController::class, 'returnForm'])->name('books.return-form');
    Route::post('/books/{bookAssignment}/return', [BorrowBooksController::class, 'returnBook'])->name('books.return');
});

//Admin, Editor, Viewer
Route::middleware(['auth:staff', 'role:editor|admin|viewer', 'preventBack'])->group(function () {
    //view books
    Route::get('/staff/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/staff/books/{book}', [BookController::class, 'show'])->name('books.show');

    //dashboard access for staff
    Route::get('/staff/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');

    //logout
    Route::post('staff/logout', [StaffLoginController::class, 'logout'])->name('staff.logout');
    Route::post('reader/logout', [ReaderLoginController::class, 'logout'])->name('reader.logout');
});

//Admin, Editor
Route::middleware(['auth:staff', 'role:editor|admin', 'preventBack'])->group(function () {
    //edit books
    Route::get('/staff/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/staff/books/{book}', [BookController::class, 'update'])->name('books.update');

    //assign books
    Route::get('/books/{id}/assign', [BookController::class, 'showAssign'])->name('books.assign-get');
    Route::post('/books/{id}/assign', [BookController::class, 'doAssign'])->name('books.assign-post');
});

// Reader Dashboard Routes
Route::middleware(['auth:reader', 'role:reader'])->group(function () {
    Route::get('/reader/dashboard', [ReaderController::class, 'index'])->name('reader.dashboard');
    Route::get('/reader/borrowed-books', [ReaderController::class, 'borrowedBooks'])->name('reader.borrowed-books');
    Route::get('/reader/borrowing-history', [ReaderController::class, 'borrowingHistory'])->name('reader.borrowing-history');
});
