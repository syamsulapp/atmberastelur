<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes buat get semua data beras atau beras dan telur
Route::get('/getApiTelur', [\App\Http\Controllers\ApiGetController::class, 'getDataAllBerasTelurAtauBeras'])->name('getDataTelur');

// beras telur
Route::get('/dmi/request/beras/telur/{id}/{telur_beras}/{telur}', [\App\Http\Controllers\ApiGetController::class, 'updateDataBerasTelur'])->name('update-data');
// beras
Route::get('/dmi/request/beras/{id}/{beras}', [\App\Http\Controllers\ApiGetController::class, 'updateDataBeras'])->name('update-data-beras');

/** BEGIN::routes waktu pengambilan dan status pengambilan */
Route::get('/dmi/request/waktu_pengambilan/{id}/{waktu_pengambilan}/', [\App\Http\Controllers\ApiGetController::class, 'waktu_pengambilan'])->name('waktu_pengambilan');
/** END::routes waktu pengambilan dan status pengambilan */
Route::get('/dmi/request/status_pengambilan/{id}/{status_pengambilan}', [\App\Http\Controllers\ApiGetController::class, 'status_pengambilan'])->name('status_pengambilan');

/** Routes BEGIN::jumlah max pengambilan */
Route::get('/dmi/request/max_pengambilan/{id}/{max_pengambilan}', [\App\Http\Controllers\ApiGetController::class, 'max_pengambilan'])->name('max_pengambilan');
/** Routes END::jumlah max pengambilan */


Route::get('/getApi/{id}', [\App\Http\Controllers\ApiGetController::class, 'getDataAllBerasTelurAtauBerasId'])->name('getDataId');
// Route::get('/getApi/{id1}/&&/{id2}', [\App\Http\Controllers\ApiGetController::class, 'getDataDoubleID'])->name('getDoubleID');
