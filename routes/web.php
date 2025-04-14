<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.pages.home');
});
Route::get('/login', function () {
    return view('customer.pages.login');
});
