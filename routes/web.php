<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('pages/adminform');
});
Route::get('/', function () {
    return view('Login/login');
});
