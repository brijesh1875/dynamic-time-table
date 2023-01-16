<?php

use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('inputs');
});

Route::prefix('time')->group(function () {
    Route::post('/store', [TimeController::class, 'store'])->name('store');
    Route::get('/subject-details', [TimeController::class, 'setDetail'])->name('setDetail');
    Route::post('/generate-time-table', [TimeController::class, 'generateTimeTable'])->name('generateTimeTable');
});
