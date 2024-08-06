<?php

use Illuminate\Support\Facades\Route;

Route::get('product/{id}', function () {
    return view('app');
});


Route::get('/load', function () {
    return view('app');
});

Route::get('/', function () {
    return view('app');
});
