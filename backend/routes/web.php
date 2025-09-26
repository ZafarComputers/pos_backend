<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;



Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     // dd('you are in dashboard');
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    // dd('you are in dashboard');
    return view('dashboard');
})->name('dashboard');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);


