<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

    Route::get('/get_all_categories', [DataController::class, 'fetchCategories']);
    Route::get('/search_place', [DataController::class, 'getPlace']);
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/host/request', [HostController::class, 'request'])->name('host.request');
        Route::post('/host/send/{user}', [HostController::class, 'sendMail'])->name('host.send');
        Route::get('/host/accept/{user}', [HostController::class, 'acceptHost'])->name('host.accept');
        Route::post('/location/store', [HostController::class, 'store'])->name('location.store');
    });

