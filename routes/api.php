<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\GoodController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/import', [ImportController::class, 'import'])->name('import');

Route::get('/goods', [GoodController::class, 'index']);
Route::get('/goods/{id}', [GoodController::class, 'show']);
