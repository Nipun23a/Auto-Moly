<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.pages.home');
})->name('home');
Route::get('/login', function () {
    return view('customer.pages.login');
})->name('login');
Route::get('/services',function (){
    return view('customer.pages.service');
})->name('service');
Route::get('/about',function (){
    return view('customer.pages.about');
})->name('about');
Route::get('/contact',function(){
    return view('customer.pages.contact');
})->name('contact');
Route::get('/scanner',function (){
    return view('customer.pages.scanner');
})->name('scanner');
Route::get('/cars',function (){
    return view('customer.pages.cars.cars');
})->name('cars');
Route::get('/car-details',function (){
    return view('customer.pages.cars.car-single');
})->name('car-details');
