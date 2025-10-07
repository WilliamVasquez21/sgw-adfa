<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function index()
    {
        $groups = [
            [
                'heading' => 'Notificaciones de jugadores',
                'items' => [
                    [
                        'title' => 'Copa Las perlitas',
                        'desc'  => 'Fue aprobado para poder jugar el torneo',
                        'date'  => 'Fecha: 04/02/2025',
                        'type'  => 'green',
                    ],
                ],
            ],
            [
                'heading' => 'Notificaciones de torneos',
                'items' => [
                    [
                        'title' => 'Copa Gatorate 2024–2025',
                        'desc'  => 'Termino periodo de inscripcion de equipos',
                        'date'  => 'Fecha del torneo: 04/02/2025',
                        'type'  => 'green',
                    ],
                ],
            ],
            [
                'heading' => 'Notificaciones de Reportes arbitrales',
                'items' => [
                    [
                        'title' => 'Partido Juvenil A vs Flor de Cafe',
                        'desc'  => 'Reporte arbitral presentado: 3 Días habiles para apelar',
                        'date'  => 'Fecha del torneo: 05/08/2023',
                        'type'  => 'green',
                    ],
                ],
            ],
            [
                'heading' => 'Notificaciones de Equipos',
                'items' => [
                    [
                        'title' => 'Flor de Cafe',
                        'desc'  => 'Tiene datos desactualizados para participar esta temporada',
                        'date'  => 'Fecha del torneo: 03/08/2023',
                        'type'  => 'red',
                    ],
                ],
            ],
        ];

        return view('notificaciones', compact('groups'));
    }
}
