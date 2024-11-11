<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/contactos', function () {
        return view('contactos.index');
    })->name('contactos.index');

    Route::resource('/contactos', ContactoController::class);
    Route::get('contactos/{contacto}/edit', [ContactoController::class, 'edit'])->name('contactos.edit');
    Route::resource('/etiquetas', EtiquetaController::class);
    Route::patch('/etiquetas/{etiqueta}/remove-contact/{contacto}', [EtiquetaController::class, 'removeContact'])->name('etiquetas.removerContacto');
});

require __DIR__ . '/auth.php';
