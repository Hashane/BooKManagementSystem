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

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'checkScope:read-books']], function () {
    // Routes that require 'read-books' scope
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'checkScope:create-books']], function () {
    // Routes that require 'create-books' scope
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'checkScope:edit-books']], function () {
    Route::put('books/{book}', [StaffAPILoginController::class, 'updateBook']);
});
