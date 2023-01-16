<?php

use App\Http\Controllers\TimeTableController;
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
    Route::post('/store', [TimeTableController::class, 'store'])->name('store');
    Route::get('/subject-details', [TimeTableController::class, 'setDetail'])->name('setDetail');
    Route::post('/generate-time-table', [TimeTableController::class, 'generateTimeTable'])->name('generateTimeTable');
});
