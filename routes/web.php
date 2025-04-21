<?php

use App\Http\Controllers\AdminVehicleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home');

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
Route::get('/car-details',function (){
    return view('customer.pages.cars.car-single');
})->name('car-details');
Route::get('/compare',function (){
    return view('customer.pages.vehicles.compare');
})->name('compare');
Route::get('/scanner',function (){
    return view('customer.pages.scanner');
})->name('scanner');


Route::get('/search', [\App\Http\Controllers\DashboardController::class, 'searchVehicles'])->name('search.vehicles');
Route::get('/vehicles', [VehicleController::class, 'index'])->name('customer.vehicles.index');
Route::get('/vehicles/{slug}',[VehicleController::class,'show'])->name('customer.vehicles.show');
Route::get('/vehicle/search', [VehicleController::class, 'search'])->name('customer.vehicles.search');

Route::get('/new', [VehicleController::class, 'filterByCondition'])->name('customer.vehicles.new')->defaults('condition', 'new');
Route::get('/used', [VehicleController::class, 'filterByCondition'])->name('customer.vehicles.used')->defaults('condition', 'used');
Route::get('/compare', [VehicleController::class, 'compare'])->name('customer.vehicles.compare');
Route::middleware(['auth'])->group(function () {
    Route::post('/chatbot/query', [App\Http\Controllers\ChatbotController::class, 'processQuery'])->name('chatbot.query');
    Route::get('/vehicle/sell',[VehicleController::class,'create'])->name('vehicle.sell');
    Route::post('/vehicle/sell',[VehicleController::class,'store'])->name('vehicle.sell');
});



Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class,'index'])->name('dashboard');
    Route::resource('/profile',ProfileController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('models',ModelController::class);
    Route::resource('vehicles',\App\Http\Controllers\AdminVehicleController::class);
    Route::patch('/vehicles/{vehicle}/update-status',[AdminVehicleController::class,'updateStatus'])->name('vehicles.updateStatus');
});


