<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cities', [App\Http\Controllers\CityController::class, 'index'])->name('cities.index');
Route::get('/cities/top-tourist', [App\Http\Controllers\CityController::class, 'topTouristDestinations'])->name('cities.top_tourist');
Route::get('/cities/continent/{continent}', [App\Http\Controllers\CityController::class, 'byContinent'])->name('cities.continent');
Route::get('/cities/{id}', [App\Http\Controllers\CityController::class, 'show'])->name('cities.show');
?>
