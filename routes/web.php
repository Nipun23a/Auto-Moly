<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.pages.home');
})->name('home');
// Show Login Page
Route::get('/login',[UserController::class,'loginPage'])->name('login.page');
//Show Registration Page
Route::get('/register',[UserController::class,'registerPage'])->name('register.page');
// Handle Login
Route::post('/login',[UserController::class,'login'])->name('login');
// Handle Registration
Route::post('/register',[UserController::class,'store'])->name('register');

//1 Logout Screen
Route::post('/logout',[UserController::class,'logout'])->name('logout');
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
Route::get('/vehicle',function (){
    return view('customer.pages.vehicles.index');
})->name('vehicle');
Route::get('/car-details',function (){
    return view('customer.pages.cars.car-single');
})->name('car-details');
Route::get('/compare',function (){
    return view('customer.pages.vehicles.compare');
})->name('compare');
Route::get('/sell',function (){
    return view('customer.pages.vehicles.create');
})->name('vehicle.sell');
Route::get('/scanner',function (){
    return view('customer.pages.scanner');
})->name('scanner');

