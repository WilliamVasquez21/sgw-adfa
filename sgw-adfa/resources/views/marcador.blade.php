@extends('layouts.app')

@section('content')

@vite(['resources/css/marcador.css'])


<div class="contenedor-principal-pagina">
  <div class="space-y-8">
    <header class="text-white">
      <h1 class="text-2xl font-semibold text-center">Tabla de posiciones</h1>
    </header>

    {{-- Tabla de posiciones --}}
    <div class="seccion-tabla">
      @include('tablas.tabla_posiciones', ['tabla' => $tabla])
    </div>

    {{-- Goleadores --}}
    <div class="seccion-tabla ">
      <h1 class="text-2xl font-semibold text-center text-white">Goleadores</h1>
      @include('tablas.goleadores', ['goleadores' => $goleadores])
    </div>

    {{-- Guardametas --}}
    <div class="seccion-tabla">
      <h2 class="text-2xl font-semibold text-center text-white">Guardametas</h2>
      @include('tablas.guardametas', ['guardametas' => $guardametas])
    </div>

    {{-- Calendario --}}
    <div class="seccion-tabla">
      <h2 class="text-2xl font-semibold text-center text-white">Calendario</h2>
      @include('tablas.calendario', ['calendario' => $calendario])
    </div>
  </div>
</div>
@endsection