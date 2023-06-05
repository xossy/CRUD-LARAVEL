<?php

use App\Http\Controllers\{seriesController,SeasonsController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route('series.index');
});

Route::resource('/series', SeriesController::class)->except('show');
Route::get('series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
