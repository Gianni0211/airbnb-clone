<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/prova', function (Request $request) {
    return response()->json($request);
});



Route::get('/get_all_categories', [DataController::class, 'fetchCategories']);
Route::get('/search_place', [DataController::class, 'getPlace']);
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/host/request', [HostController::class, 'request'])->name('host.request');
    Route::post('/host/send/{user}', [HostController::class, 'sendMail'])->name('host.send');
    Route::get('/host/accept/{user}', [HostController::class, 'acceptHost'])->name('host.accept');
    Route::post('/location/store', [HostController::class, 'store'])->name('location.store');
});

