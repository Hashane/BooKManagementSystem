<?php

use App\Http\Controllers\API\ReaderAPILoginController;
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

// UNAUTH API FOR USE LOGIN
Route::post('reader/apilogin', [ReaderAPILoginController::class, 'readerLogin'])->name('reader.api-login');

// AUTHENTICATION API FOR USE
Route::group(['prefix' => 'reader', 'middleware' => ['auth:reader-api', 'scopes:reader']], function () {


    Route::get('books', [ReaderAPILoginController::class, 'getBooks']);
    Route::get('books/{book}', [ReaderAPILoginController::class, 'findBook']);

    Route::get('list', [ReaderAPILoginController::class, 'getUsers']);
    Route::post('books', [ReaderAPILoginController::class, 'createBook']);
    Route::delete('books/{book}', [ReaderAPILoginController::class, 'destroyBook']);
    //  Route::put('books/{book}', [ReaderAPILoginController::class, 'updateBook']);

    Route::post('dashboard', [ReaderAPILoginController::class, 'readerDashboard'])->name('reader.apidashboard');
});
