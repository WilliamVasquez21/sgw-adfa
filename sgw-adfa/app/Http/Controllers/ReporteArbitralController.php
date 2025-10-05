<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ReporteArbitralController extends Controller
{
    private $cronogramas = [];

    public function __construct()
    {
        // Datos simulados de cronograma (en un caso real esto vendría de BD)
        $this->cronogramas = [
            [
                'id' => 1,
                'local' => 'Milan',
                'visitante' => 'Dolar Juvenil',
                'fecha' => '2025-05-11',
                'torneo' => 'Sub 13 El Tránsito 2025',
                'reporte_id' => 1, // Ya tiene reporte
            ],
            [
                'id' => 2,
                'local' => 'Barcelona',
                'visitante' => 'Real Madrid',
                'fecha' => '2025-09-01',
                'torneo' => 'Liga Española',
                'reporte_id' => null, // No tiene reporte
            ],
            [
                'id' => 3,
                'local' => 'Juventus',
                'visitante' => 'Inter',
                'fecha' => '2025-10-10',
                'torneo' => 'Serie A Italia',
                'reporte_id' => null,
            ],
        ];
    }

    // Muestra los partidos del cronograma
    public function index()
    {
        $cronogramas = $this->cronogramas;
        $hoy = Carbon::now()->format('Y-m-d');
        return view('reportearbitral.gs_arbitral', compact('cronogramas', 'hoy'));
    }

    // FORMULARIO para crear el reporte de un cronograma específico
    public function crearReporte($cronograma_id)
{
    // Busca el partido seleccionado
    $partido = collect($this->cronogramas)->firstWhere('id', $cronograma_id);

    if (!$partido) {
        abort(404, 'Partido no encontrado');
    }

    // Preparar estructura inicial para el formulario
    $form = [
        'equipo_local' => [
            'nombre' => $partido['local'],
            'jugadores' => []  // Vacío para rellenar en el formulario
        ],
        'equipo_visitante' => [
            'nombre' => $partido['visitante'],
            'jugadores' => []
        ],
        'informacion' => [
            'torneo' => $partido['torneo'],
            'categoria' => '',   // Vacío
            'cancha' => '',
            'lugar' => '',
            'fecha' => $partido['fecha'],
            'hora' => '',
            'arbitro' => '',
            'asistentes' => '',
            'cuarto' => ''
        ]
    ];

    return view('reportearbitral.crear_reporte', ['partido' => $form]);
}


    // Muestra un reporte ya existente
    public function mostrarReporte($id)
    {
        $partido = collect($this->cronogramas)->firstWhere('reporte_id', $id);

        if (!$partido) {
            abort(404, 'Reporte no encontrado');
        }

        // Datos de ejemplo para el reporte
        $reporte = [
            'titulo' => 'Reporte arbitral - ' . $partido['torneo'],
            'equipo_local' => [
                'nombre' => $partido['local'],
                'escudo' => asset('img/milan.png'),
                'goles' => 2,
                'jugadores' => [
                    ['numero' => 10, 'nombre' => 'Juan José Medina', 'minuto' => 52],
                    ['numero' => 9, 'nombre' => 'Carlos López', 'minuto' => 40]
                ],
            ],
            'equipo_visitante' => [
                'nombre' => $partido['visitante'],
                'escudo' => asset('img/dolar.png'),
                'goles' => 3,
                'jugadores' => [
                    ['numero' => 7, 'nombre' => 'José Gómez', 'minuto' => 23]
                ],
            ],
            'informacion' => [
                'torneo' => $partido['torneo'],
                'fecha' => $partido['fecha'],
                'arbitro' => 'Gerardo Solís'
            ],
            'observaciones' => 'No hubo incidencias.',
        ];

        return view('reportearbitral.gs_reporte', compact('reporte'));
    }
    public function guardarReporte(Request $request)
{
    // Aquí podrías procesar los datos y guardarlos en la base de datos.
    // Por ahora, solo retornaremos todo lo enviado para prueba.

    $datos = $request->all();

    // Puedes redirigir a la lista de cronogramas o mostrar el reporte creado
    return redirect()->route('inicio')->with('success', 'Reporte guardado correctamente!');
}

}
