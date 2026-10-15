<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Test admin
Route::middleware(['auth', 'admin'])->get('/admin', function () {
    return 'Route admin';
});
//Ruta brands
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('brands', BrandController::class)->except('show');
});

require __DIR__.'/auth.php';
