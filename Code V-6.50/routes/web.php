<?php

use App\Http\Controllers\BusquedaController;
use Illuminate\Support\Facades\Route;


// Auth::routes();// Todas las vistas estan avilitadas
Auth::routes(['register'=>false]);// Para desabilitar una vista

// Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth');

use App\Http\Controllers\VisitanteController;

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);

    // Procedimiento para escanear un QR
    Route::get('/buscar', [BusquedaController::class, 'index']);
    Route::post('/buscar', [BusquedaController::class, 'buscar'])->name('buscar.id');

    // Vista de visitantes
    Route::get('/visitante', [VisitanteController::class, 'index'])->name('visitante.index');
    Route::get('/visitante/create', [VisitanteController::class, 'create'])->name('visitante.create');
    Route::post('/visitante', [VisitanteController::class, 'store'])->name('visitante.store');
    Route::get('/visitante/{visitante}', [VisitanteController::class, 'show'])->name('visitante.show');
    Route::get('/visitante/{visitante}/pdf', [VisitanteController::class, 'generarPDF'])->name('visitante.pdf');

    // Vista de planteles
    Route::get('/plantele', [App\Http\Controllers\PlanteleController::class, 'index']);
    Route::get('/plantele/{id}', [App\Http\Controllers\PlanteleController::class, 'show']);    
});


// Vista de visitantes
// Route::get('/visitante', [App\Http\Controllers\VisitanteController::class, 'index']);
// Route::get('/visitante/{id}', [App\Http\Controllers\VisitanteController::class, 'show']);
// Route::get('/visitante/create', [App\Http\Controllers\VisitanteController::class, 'create']);
// Route::post('/visitante/{request}', [App\Http\Controllers\VisitanteController::class, 'store']);

// Vista de planteles
// Route::get('/plantele', [App\Http\Controllers\PlanteleController::class, 'index']);
// Route::get('/plantele/{id}', [App\Http\Controllers\PlanteleController::class, 'show']);
