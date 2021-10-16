<?php

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
    return view('welcome');
});
// Route::get('/umk/', [\App\Http\Controllers\HttpClientUsers::class, 'index_get_view'])->name('umk');
//Route::get('/umk/getdata', [\App\Http\Controllers\HttpClientUsers::class, 'get_data_beras'])->name('get-data');
Route::get('/berastelur', [\App\Http\Controllers\HttpClientUsers::class, 'getTelurDanBeras'])->name('getTelur');
