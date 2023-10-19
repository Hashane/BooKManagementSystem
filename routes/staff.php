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

Route::post('staff/apilogin', [StaffAPILoginController::class, 'staffLogin'])->name('staff.api-login');

Route::group(['prefix' => 'staff', 'middleware' => ['auth:staff-api', 'scopes:staff']], function () {

    Route::post('dashboard', [StaffAPILoginController::class, 'staffDashboard'])->name('staff.apidashboard');
});
