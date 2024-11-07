<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/app', function () {
        return view('contactos.index');
    })->name('contactos.index');

    Route::resource('/contactos', ContactoController::class);
});

require __DIR__ . '/auth.php';
