@extends('layouts.app')

@section('content')
@include('componentes.menu')
<div class="min-h-screen bg-[url('/images/cancha.jpg')] bg-cover bg-center flex flex-col items-center justify-center p-6 space-y-4">

    <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-white font-semibold self-start">
        Actualizar Jugador
    </button>

    <div class="bg-black/90 text-white shadow-xl w-full max-w-3xl p-6 relative 
                rounded-tr-2xl rounded-bl-[80px]">
        <div class="flex items-start justify-between mb-6">
            <div class="flex-1 pr-4">
                <h3 class="text-2xl font-bold mb-2">{{ $jugador->nombre }}</h3>
                <div class="inline-block bg-white text-black px-4 py-1 transform -skew-x-32">
                    <span class="block transform skew-x-12 font-semibold">
                        Datos personales
                    </span>
                </div>

                <ul class="mt-2 text-sm space-y-1">
                    <li><strong>Fecha de nacimiento:</strong> {{ $jugador->fecha_nacimiento }}</li>
                    <li><strong>Lugar de nacimiento:</strong> {{ $jugador->lugar_nacimiento }}</li>
                    <li><strong>Dirección:</strong> {{ $jugador->direccion }}</li>
                    <li><strong>Número de teléfono:</strong> {{ $jugador->telefono }}</li>
                    <li><strong>Correo:</strong> {{ $jugador->correo }}</li>
                    <li><strong>Estado civil:</strong> {{ $jugador->estado_civil }}</li>
                    <li><strong>Número de DUI:</strong> {{ $jugador->dui }}</li>
                </ul>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ $jugador->foto_url }}"
                    alt="{{ $jugador->nombre }}"
                    class="w-32 h-32 rounded-full border-4 border-white shadow-md">
                <div class="flex space-x-2 mt-4">
                    <img src="/images/barcelona.png" alt="FC Barcelona" class="w-10 h-10">
                    <img src="/images/10.png" alt="Número 10" class="w-10 h-10">
                </div>
            </div>
        </div>
        <div class="inline-block bg-white text-black px-4 py-1 transform -skew-x-32">
            <span class="block transform skew-x-12 font-semibold">
                Datos del jugador
            </span>
        </div>
        <ul class="mt-2 text-sm space-y-1">
            <li><strong>Posición:</strong> {{ $jugador->posicion }}</li>
            <li><strong>Equipos:</strong> {{ $jugador->equipos }}</li>
            <li><strong>Estadísticas - Partidos:</strong> {{ $jugador->partidos }}</li>
            <li><strong>Goles:</strong> {{ $jugador->goles }}</li>
            <li><strong>Asistencias:</strong> {{ $jugador->asistencias }}</li>
        </ul>
    </div>

</div>
@endsection