<?php

use App\Http\Controllers\JugadorController;
use App\Http\Controllers\MarcadorControlador;
use App\Http\Controllers\NotificacionController;
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

//Route::get('/jugadores', function () {
  //  return view('errores.no_disponible');
//})->name('jugadores');

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




Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

//login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
//gestion de jugadores
Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
//nuevo jugador
Route::get('/jugadores/jugador', [JugadorController::class, 'create'])->name('jugadores.create');
//perfil jugador
Route::get('/perfiljugador', [JugadorController::class, 'perfilJugador'])->name('jugadores.perfiljugador');
//tablas de puntuaciones
Route::get('/tabla', [MarcadorControlador::class, 'tablas'])->name('marcador.tablas');
//notificaciones
Route::get('/notificacion', [NotificacionController::class, 'index'])->name('notificaciones.index');