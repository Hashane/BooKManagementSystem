<?php

use App\Http\Controllers\API\StaffAPILoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('staff/create-token', [StaffAPILoginController::class, 'staffLogin']);

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'checkScope:view-books']], function () {
    Route::get('books', [StaffAPILoginController::class, 'getBooks']);
    Route::get('books/{book}', [StaffAPILoginController::class, 'findBook']);
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'checkScope:create-books']], function () {
    Route::post('books', [StaffAPILoginController::class, 'createBook']);
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'checkScope:delete-books']], function () {
    Route::delete('books/{book}', [StaffAPILoginController::class, 'destroyBook']);
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'checkScope:edit-books']], function () {
    Route::put('books/{book}', [StaffAPILoginController::class, 'updateBook']);
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'checkScope:manage-users']], function () {
    Route::get('users', [StaffAPILoginController::class, 'getUsers']);
    Route::get('readers', [StaffAPILoginController::class, 'getReaders']);
});
