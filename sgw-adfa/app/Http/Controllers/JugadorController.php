<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
{
    $jugadores = [
        (object) [
            'foto_url' => '/images/jugadores/ronaldinho.jpg',
            'nombre' => 'Ronaldinho Gaucho',
            'edad' => 34,
            'lugar_nacimiento' => 'Porto Alegre, Brasil',
            'fecha_nacimiento' => '21/03/1980',
            'club' => 'FC Barcelona',
            'categoria' => 'Primera División',
            'altura' => 181,
            'posicion' => 'Mediapunta',
            'equipos' => 'Barcelona, PSG, Milan',
            'partidos' => 97,
            'goles' => 33,
            'asistencias' => 27,
            'escudo_club' => '/images/clubes/barcelona.png',
            'escudo_seleccion' => '/images/clubes/brasil.png',
        ],
        (object) [
            'foto_url' => '/images/jugadores/messi.jpg',
            'nombre' => 'Lionel Messi',
            'edad' => 37,
            'lugar_nacimiento' => 'Rosario, Argentina',
            'fecha_nacimiento' => '24/06/1987',
            'club' => 'Inter Miami',
            'categoria' => 'MLS',
            'altura' => 169,
            'posicion' => 'Delantero',
            'equipos' => 'Barcelona, PSG, Inter Miami',
            'partidos' => 187,
            'goles' => 120,
            'asistencias' => 70,
            'escudo_club' => '/images/clubes/intermiami.png',
            'escudo_seleccion' => '/images/clubes/argentina.png',
        ],
        (object) [
            'foto_url' => '/images/jugadores/kaka.jpg',
            'nombre' => 'Kaká',
            'edad' => 30,
            'lugar_nacimiento' => 'Gama, Brasil',
            'fecha_nacimiento' => '22/04/1982',
            'club' => 'AC Milan',
            'categoria' => 'Serie A',
            'altura' => 186,
            'posicion' => 'Mediocampista Ofensivo',
            'equipos' => 'Sao Paulo, Milan, Real Madrid',
            'partidos' => 150,
            'goles' => 75,
            'asistencias' => 45,
            'escudo_club' => '/images/clubes/milan.png',
            'escudo_seleccion' => '/images/clubes/brasil.png',
        ],
    ];

    return view('jugadores.index', compact('jugadores'));
}



    public function create()
{
    return view('jugadores.jugador');
}

public function perfilJugador()
{
    $jugador = (object) [
        'foto_url' => '/images/jugadores/ronaldinho.jpg',
        'nombre' => 'Ronaldinho Gaucho',
        'fecha_nacimiento' => '08/05/1999',
        'lugar_nacimiento' => 'San Miguel',
        'direccion' => 'Colonia las amapolas, San Miguel',
        'telefono' => '7793-1215',
        'correo' => 'ronaldinho@gmail.com',
        'estado_civil' => 'Casado',
        'dui' => '12345678-9',
        'posicion' => 'Delantero',
        'equipos' => 'Grêmio de Porto Alegre, Paris Saint-Germain, FC Barcelona, A.C. Milan, Flamengo',
        'partidos' => 670,
        'goles' => 581,
        'asistencias' => 672,
    ];

    return view('jugadores.perfiljugador', compact('jugador'));
}

}
