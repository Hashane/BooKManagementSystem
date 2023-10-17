<?php

use App\Http\Controllers\Auth\ReaderLoginController;
use App\Http\Controllers\Auth\StaffLoginController;
use App\Http\Controllers\BorrowBooksController;
use App\Http\Controllers\Reader\ReaderController;
use App\Http\Controllers\Staff\BookController;
use App\Http\Controllers\Staff\StaffController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// For staff authentication
Route::prefix('staff')->group(function () {
    Route::get('login', [StaffLoginController::class, 'showLoginForm'])->name('staff.login');
    Route::post('login', [StaffLoginController::class, 'login']);
    Route::post('logout', [StaffLoginController::class, 'logout'])->name('staff.logout');
    // Todo password reset.
});

// For reader authentication
Route::prefix('reader')->group(function () {
    Route::get('login', [ReaderLoginController::class, 'showLoginForm'])->name('reader.login');
    Route::post('login', [ReaderLoginController::class, 'login']);
    Route::post('logout', [ReaderLoginController::class, 'logout'])->name('reader.logout');
    // Todo password reset.
});

// Admin Dashboard Routes
Route::middleware(['auth:staff', 'role:admin'])->group(function () {
    Route::resource('/staff/books', BookController::class);
    Route::get('/staff/manage-users', [UserManagementController::class, 'index'])->name('staff.manage-users');
    Route::get('/staff/borrowed-books', [StaffController::class, 'showBorrowed'])->name('staff.borrowed-books');
    Route::get('/staff/borrowing-history', [StaffController::class, 'borrowingHistory'])->name('staff.borrowing-history');
    Route::get('/books/{bookAssignment}/return', [BorrowBooksController::class, 'returnForm'])->name('books.return-form');
    Route::post('/books/{bookAssignment}/return', [BorrowBooksController::class, 'returnBook'])->name('books.return');
});

//Admin, Editor, Viewer
Route::middleware(['auth:staff', 'role:editor|admin|viewer'])->group(function () {
    Route::get('/staff/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
    Route::get('/books/{id}/assign', [BookController::class, 'showAssign'])->name('books.assign-get');
    Route::post('/books/{id}/assign', [BookController::class, 'doAssign'])->name('books.assign-post');
});

// Reader Dashboard Routes
Route::middleware(['auth:reader', 'role:reader'])->group(function () {
    Route::get('/reader/dashboard', [ReaderController::class, 'index'])->name('reader.dashboard');
    Route::get('/reader/borrowed-books', [ReaderController::class, 'borrowedBooks'])->name('reader.borrowed-books');
    Route::get('/reader/borrowing-history', [ReaderController::class, 'borrowingHistory'])->name('reader.borrowing-history');
});

//show books
Route::middleware(['auth', 'check.book.authorization'])->group(function () {
    // Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');
});
