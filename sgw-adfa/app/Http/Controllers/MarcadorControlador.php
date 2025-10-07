<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcadorControlador extends Controller
{
    public function tablas()
    {
        $tabla = [
            ['posicion' => 1, 'equipo' => 'C.D. Centro', 'logo' => 'imagenes/equipos/equipo1.png', 'pj' => 10, 'pg' => 8, 'pe' => 1, 'pp' => 1, 'gf' => 25, 'gc' => 8, 'dif' => 17, 'pts' => 25],
            ['posicion' => 2, 'equipo' => 'Atlético Sur', 'logo' => 'imagenes/equipos/equipo2.png', 'pj' => 10, 'pg' => 7, 'pe' => 2, 'pp' => 1, 'gf' => 20, 'gc' => 10, 'dif' => 10, 'pts' => 23],
        ];
        $jornadas = range(1, 11); 

        $goleadores = [
            [
                'nombre' => 'William Alexander Chávez Crespo',
                'jornadas' => [1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 0, 6 => 2, 7 => 1, 8 => 1, 9 => 1, 10 => 1, 11 => 1],
                'total' => 11
            ],
            [
                'nombre' => 'Brandy Alfredo Vásquez Flores',
                'jornadas' => [1 => 1, 2 => 1, 3 => 1, 4 => 0, 5 => 1, 6 => 1, 7 => 1, 8 => 1, 9 => 1, 10 => 1, 11 => 1],
                'total' => 10
            ],
        ];

        $jornadas = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];

        $guardametas = [
            [
                'nombre' => 'Carlos López',
                'equipo' => 'C.D. Centro',
                'jornadas' => [1 => 1, 2 => 0, 3 => 1, 4 => 1, 5 => 0, 6 => 1, 7 => 0, 8 => 1, 9 => 0, 10 => 1, 11 => 0],
                'total' => 5
            ],
            [
                'nombre' => 'Miguel Rivas',
                'equipo' => 'Atlético Sur',
                'jornadas' => [1 => 0, 2 => 1, 3 => 1, 4 => 0, 5 => 1, 6 => 0, 7 => 1, 8 => 0, 9 => 1, 10 => 0, 11 => 0],
                'total' => 4
            ],
        ];

        $calendario = [
            [
                'fecha' => '20/04/25',
                'hora' => '3:00 PM',
                'local' => 'C. D Rosario Central',
                'visitante' => 'C.D Ciprés Juvenil',
                'resultado' => '10 - 1'
            ],
            [
                'fecha' => '27/04/25',
                'hora' => '3:00 PM',
                'local' => 'BANNY SF. C.',
                'visitante' => 'C.D Ciprés Juvenil',
                'resultado' => '3 - 2'
            ],
            [
                'fecha' => '20/06/25',
                'hora' => '3:00 PM',
                'local' => 'C. D Rosario Central',
                'visitante' => 'C.D Ciprés Juvenil',
                'resultado' => 'Por jugarse'
            ],
            [
                'fecha' => '20/04/25',
                'hora' => '3:00 PM',
                'local' => 'C. D Rosario Central',
                'visitante' => 'C.D Ciprés Juvenil',
                'resultado' => 'Por jugarse'
            ],
        ];
        return view('marcador', compact('tabla', 'goleadores', 'guardametas', 'calendario', 'jornadas'));
    }
}
