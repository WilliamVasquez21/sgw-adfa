<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteArbitralController;

Route::get('/arbitral', [ReporteArbitralController::class, 'index'])->name('inicio');

// Crear reporte
Route::get('/reporte/crear/{cronograma_id}', [ReporteArbitralController::class, 'crearReporte'])->name('crear_reporte');

// Guardar reporte
Route::post('/reporte/guardar', [ReporteArbitralController::class, 'guardarReporte'])->name('guardar_reporte');

// Mostrar reporte existente
Route::get('/reporte/{id}', [ReporteArbitralController::class, 'mostrarReporte'])->name('reporte');



// Página de inicio alternativa (si la necesitas)
Route::get('/home', function () {
    return view('home');
})->name('home');

// Módulos aún no disponibles — redirigen a la vista de "no disponible"
Route::get('/analiticas', function () {
    return view('errores.no_disponible');
})->name('analiticas');

Route::get('/jugadores', function () {
    return view('errores.no_disponible');
})->name('jugadores');

Route::get('/equipos', function () {
    return view('errores.no_disponible');
})->name('equipos');

Route::get('/arbitros', function () {
    return view('errores.no_disponible');
})->name('arbitros');

Route::get('/torneos', function () {
    return view('errores.no_disponible');
})->name('torneos');

Route::get('/notificaciones', function () {
    return view('errores.no_disponible');
})->name('notificaciones');

Route::get('/superusuario', function () {
    return view('errores.no_disponible');
})->name('superusuario');

// Ruta fallback para cualquier URL no registrada
Route::fallback(function () {
    return view('errores.no_disponible');
});
