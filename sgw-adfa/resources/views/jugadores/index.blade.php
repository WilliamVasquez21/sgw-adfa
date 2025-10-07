@extends('layouts.app')

@section('title', 'Gestión de Jugadores')

@section('content')

@include('componentes.menu')

<div class="ml-24 px-8 pb-12">

    <h1 class="text-4xl font-extrabold text-white text-center mb-10 drop-shadow-md">
        Gestión de Jugadores
    </h1>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-8">
        <div class="bg-white bg-opacity-95 p-6 rounded-2xl shadow-xl text-black text-center">
            <p class="text-lg font-semibold">Jugadores Inscritos</p>
            <p class="text-4xl font-extrabold">4000</p>
        </div>
        <div class="bg-white bg-opacity-95 p-6 rounded-2xl shadow-xl text-black text-center">
            <p class="text-lg font-semibold">Jugadores Activos</p>
            <p class="text-4xl font-extrabold">2830</p>
        </div>
        <div class="bg-white bg-opacity-95 p-6 rounded-2xl shadow-xl text-black text-center">
            <p class="text-lg font-semibold">Jugadores No Activos</p>
            <p class="text-4xl font-extrabold">1170</p>
        </div>
    </div>
    <div class="flex justify-end mb-6">
        <a href="{{ route('jugadores.create') }}"
           class="bg-blue-700 text-white px-8 py-3 rounded-2xl shadow-lg hover:bg-blue-800 transition text-lg font-semibold">
            NUEVO JUGADOR
        </a>
    </div>
    <h2 class="text-2xl font-bold mb-3 text-white drop-shadow">
        Listado de jugadores inscritos
    </h2>

    <div class="flex justify-end mb-8">
        <input type="text" placeholder="Buscar jugador..."
               class="w-full sm:w-1/3 px-5 py-3 rounded-2xl shadow focus:ring-2 focus:ring-blue-600 focus:outline-none text-lg bg-white/90">
    </div>
    <div class="space-y-12">
        @foreach($jugadores as $jugador)
        <div class="relative w-full flex justify-center">
            <div class="relative bg-gradient-to-br from-blue-800 to-blue-900 p-6 rounded-2xl shadow-2xl w-full sm:w-3/4 text-white z-10 overflow-visible">
                <div class="absolute -top-0 -left-24 z-15">
                    <div class="relative bg-white rounded-lg shadow-xl">
                        <div class="absolute top-0 left-0 w-full h-[10px] rounded-23px bg-blue-900"></div>
                        <div class="absolute top-0 left-0 w-[10px] h-full bg-blue-900"></div>

                        <img src="{{ $jugador->foto_url }}" alt="Foto jugador"
                             class="w-28 h-28 object-cover rounded-md border border-blue-500">
                    </div>
                </div>

                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-800/40 backdrop-blur-sm border border-blue-300/60 text-white font-extrabold text-xl px-8 py-2 rounded-b-2xl shadow-md">
                    {{ $jugador->nombre }}
                </div>
                <div class="flex items-start space-x-6 mt-12">
                    <div class="flex-1">
                        <div class="bg-white/10 p-4 rounded-xl mb-4">
                            <h4 class="inline-block bg-white text-blue-900 font-bold px-4 py-1 transform -skew-x-30">
                                Datos Personales
                            </h4>
                            <p><span class="font-semibold">Lugar de nacimiento:</span> {{ $jugador->lugar_nacimiento }}</p>
                            <p><span class="font-semibold">Fecha de nacimiento:</span> {{ $jugador->fecha_nacimiento }}</p>
                        </div>
                        <div class="bg-white/10 p-4 rounded-xl">
                            <h4 class="inline-block bg-white text-blue-900 font-bold px-4 py-1 transform -skew-x-30">
                                Datos del Jugador
                            </h4>
                            <p><span class="font-semibold">Posición:</span> {{ $jugador->posicion }}</p>
                            <p><span class="font-semibold">Equipos:</span> {{ $jugador->equipos }}</p>
                            <p><span class="font-semibold">Partidos:</span> {{ $jugador->partidos }}</p>
                            <p><span class="font-semibold">Goles:</span> {{ $jugador->goles }}</p>
                            <p><span class="font-semibold">Asistencias:</span> {{ $jugador->asistencias }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center space-y-4">
                        <img src="/images/clubes/barcelona.png" class="w-16 h-16" alt="Escudo club">
                        <img src="/images/clubes/brasil.png" class="w-16 h-16" alt="Selección">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
