@extends('layouts.app')

@section('titulo', 'Reportes Arbitrales')

@section('contenido')
<div class="max-w-6xl mx-auto px-8 py-6">
  <h1 class="text-white text-4xl font-bold text-center mb-6 drop-shadow-lg">
    Módulo Arbitral
  </h1>

  <!-- Botón gestión de árbitros -->
  <div class="flex justify-end mb-4">
    <button class="bg-blue-800 text-white font-bold px-6 py-2 rounded hover:bg-blue-900 transition shadow-lg">
      GESTIÓN DE ÁRBITROS
    </button>
  </div>

  <!-- Subtítulo -->
  <h2 class="text-white text-xl font-bold mb-4 text-center">
    Reportes arbitrales
  </h2>

  <!-- Buscador -->
  <div class="flex justify-end mb-6">
    <input 
      type="text" 
      placeholder="Buscar partido o fecha..." 
      class="w-80 px-4 py-2 rounded-full shadow text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
    >
  </div>

  <!-- Tabla encabezado -->
  <div class="grid grid-cols-4 bg-blue-900 text-white font-bold px-6 py-3 rounded-tl-2xl rounded-tr-2xl text-center shadow-md">
    <div class="rounded-tl-2xl">N° Reporte</div>
    <div>Partido</div>
    <div>Fecha</div>
    <div>Acción</div>
  </div>

  <!-- Cuerpo -->
  <div class="space-y-4 mt-4 overflow-y-auto">
    @foreach($cronogramas as $partido)
      <div class="grid grid-cols-4 bg-white bg-opacity-90 text-black px-6 py-4 rounded-tl-3xl rounded-br-3xl shadow-md text-center font-semibold transition hover:scale-105 hover:shadow-lg">
        <div>{{ $partido['id'] }}</div>

        <div>
          <span class="font-bold">{{ $partido['local'] }}</span><br>
          vs <br>
          <span class="font-bold">{{ $partido['visitante'] }}</span>
        </div>

        <div>{{ date('d/m/Y', strtotime($partido['fecha'])) }}</div>

        <div>
          @php
            $fechaPartido = \Carbon\Carbon::parse($partido['fecha']);
            $hoy = \Carbon\Carbon::now();
          @endphp

          {{-- Si el partido aún no se ha jugado --}}
          @if($fechaPartido->isAfter($hoy))
            <span class="text-gray-500 font-medium">No se ha jugado todavía</span>

          {{-- Si ya tiene reporte --}}
          @elseif(!empty($partido['reporte_id']))
            <a 
              href="{{ route('reporte', ['id' => $partido['reporte_id']]) }}" 
              class="text-blue-700 font-bold hover:underline hover:text-blue-900 transition"
            >
              Ver Reporte
            </a>

          {{-- Si ya pasó y no hay reporte --}}
          @else
            <a 
              href="{{ route('crear_reporte', ['cronograma_id' => $partido['id']]) }}" 
              class="text-green-700 font-bold hover:underline hover:text-green-900 transition"
            >
              Crear Reporte
            </a>
          @endif
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
