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
Route::post('reader/create-token', [ReaderAPILoginController::class, 'readerLogin']);


// AUTHENTICATION API FOR USE
Route::group(['prefix' => 'reader', 'middleware' => ['auth:reader-api', 'checkScope:view-books']], function () {
    Route::get('books', [ReaderAPILoginController::class, 'getBooks']);
    Route::get('books/{book}', [ReaderAPILoginController::class, 'findBook']);
});
