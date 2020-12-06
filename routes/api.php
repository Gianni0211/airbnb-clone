<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LocationController;

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


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'location'

], function ($router) {

    Route::post('store', [LocationController::class, 'store'])->name('location.store');
    Route::get('index', [LocationController::class, 'index'])->name('location.index');
    Route::get('show/{location}', [LocationController::class, 'show'])->name('location.show');
    Route::delete('delete/{location}', [LocationController::class, 'destroy'])->name('location.delete');
});

Route::get('/get_all_categories', [DataController::class, 'fetchCategories']);


// Route::get('/search_place', [DataController::class, 'getPlace']);
// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//     Route::get('/host/request', [HostController::class, 'request'])->name('host.request');
//     Route::post('/host/send/{user}', [HostController::class, 'sendMail'])->name('host.send');
//     Route::get('/host/accept/{user}', [HostController::class, 'acceptHost'])->name('host.accept');
//     Route::post('/location/store', [HostController::class, 'store'])->name('location.store');
// });
