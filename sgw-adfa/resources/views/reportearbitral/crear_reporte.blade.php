@extends('layouts.app')

@section('titulo', 'Crear Reporte Arbitral')

@section('contenido')
<h1 class="text-white text-4xl font-bold text-center mb-6">Reporte Arbitral</h1>

{{-- Equipos --}}
<div class="w-1/2 mx-auto mb-6 flex justify-around items-center">
    <div class="text-center">
        <img src="{{ $partido['equipo_local']['escudo'] ?? asset('img/milan.png') }}" class="mx-auto w-16 h-16 mb-2">
        <span class="text-white font-bold">{{ $partido['equipo_local']['nombre'] ?? 'Local' }}</span>
    </div>
    <span class="text-white font-bold text-2xl">VS</span>
    <div class="text-center">
        <img src="{{ $partido['equipo_visitante']['escudo'] ?? asset('img/dolar.png') }}" class="mx-auto w-16 h-16 mb-2">
        <span class="text-white font-bold">{{ $partido['equipo_visitante']['nombre'] ?? 'Visitante' }}</span>
    </div>
</div>

{{-- Información del partido --}}
<div class="w-1/2 mx-auto mb-6 grid grid-cols-1 gap-4">
    <input type="text" name="torneo" value="{{ $partido['informacion']['torneo'] ?? '' }}"
        placeholder="Torneo" class="w-full px-4 py-2 rounded-xl text-black text-center">
    <div class="grid grid-cols-2 gap-4">
        <input type="text" name="categoria" value="{{ $partido['informacion']['categoria'] ?? '' }}"
            placeholder="Categoría" class="w-full px-4 py-2 rounded-xl text-black text-center">
        <input type="date" name="fecha" value="{{ $partido['informacion']['fecha'] ?? '' }}"
            class="w-full px-4 py-2 rounded-xl text-black text-center">
    </div>
    <input type="text" name="lugar" value="{{ $partido['informacion']['lugar'] ?? '' }}"
        placeholder="Lugar" class="w-full px-4 py-2 rounded-xl text-black text-center">
    <input type="text" name="cancha" value="{{ $partido['informacion']['cancha'] ?? '' }}"
        placeholder="Cancha" class="w-full px-4 py-2 rounded-xl text-black text-center">
    <div class="grid grid-cols-2 gap-4">
        <input type="time" name="hora_señalada" value="{{ $partido['informacion']['hora'] ?? '' }}"
            class="w-full px-4 py-2 rounded-xl text-black text-center" placeholder="Hora Señalada">
        <input type="time" name="hora_inicio"
            class="w-full px-4 py-2 rounded-xl text-black text-center" placeholder="Hora de Inicio">
    </div>
</div>

{{-- Arbitraje --}}
<h2 class="text-white text-xl font-bold text-center mb-4">Arbitraje</h2>
<div class="w-1/2 mx-auto grid grid-cols-1 gap-4 mb-6">
    <input type="text" name="arbitro" value="{{ $partido['informacion']['arbitro'] ?? '' }}"
        placeholder="Arbitro" class="w-full px-4 py-2 rounded-xl text-black text-center">
    <input type="text" name="asistente1" value="{{ $partido['informacion']['asistente1'] ?? '' }}"
        placeholder="Asistente N°1" class="w-full px-4 py-2 rounded-xl text-black text-center">
    <input type="text" name="asistente2" value="{{ $partido['informacion']['asistente2'] ?? '' }}"
        placeholder="Asistente N°2" class="w-full px-4 py-2 rounded-xl text-black text-center">
    <input type="text" name="cuarto_oficial" value="{{ $partido['informacion']['cuarto_oficial'] ?? '' }}"
        placeholder="4° Oficial" class="w-full px-4 py-2 rounded-xl text-black text-center">
</div>

{{-- Anotadores --}}
<h2 class="text-white text-xl font-bold text-center mb-4">Anotadores</h2>
<div class="grid grid-cols-2 gap-6 mb-6">
    @foreach(['Local','Visitante'] as $tipo)
    @php
        $equipo = strtolower($tipo);
        $jugadores = $partido['equipo_'.$equipo]['jugadores'] ?? [];
    @endphp
    <div>
        <h3 class="text-white font-semibold text-center mb-2">{{ $partido['equipo_'.$equipo]['nombre'] ?? $tipo }}</h3>
        <button type="button" onclick="agregarGol('goles{{ $tipo }}')" style="background-color:#D9D9D9;" class="w-full text-black px-3 py-2 rounded-xl mb-2">Agregar Gol</button>
        <div id="goles{{ $tipo }}">
            <div class="grid grid-cols-4 text-black font-bold px-4 py-2 rounded-tl-3xl rounded-br-3xl text-center" style="background-color:#D9D9D9;">
                <div>N° Cam.</div><div>Nombre</div><div>Minuto</div><div>Válido</div>
            </div>
            @foreach($jugadores as $jugador)
            <div class="grid grid-cols-4 bg-white text-black px-4 py-2 text-center rounded-tl-3xl rounded-br-3xl font-medium mt-2 items-center">
                <input type="text" name="goles{{ $tipo }}[][numero]" value="{{ $jugador['numero'] }}" class="border rounded px-2 py-1 text-center">
                <input type="text" name="goles{{ $tipo }}[][nombre]" value="{{ $jugador['nombre'] }}" class="border rounded px-2 py-1 text-center">
                <input type="number" name="goles{{ $tipo }}[][minuto]" value="{{ $jugador['minuto'] }}" class="border rounded px-2 py-1 text-center">
                <div class="flex items-center justify-center gap-2 relative">
                    <input type="checkbox" name="goles{{ $tipo }}[][valido]" {{ !empty($jugador['valido']) ? 'checked' : '' }} class="mx-auto">
                    <button type="button" class="text-red-600 font-bold" onclick="confirmarEliminar(this)" title="Confirmar eliminación">X</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

{{-- Sustituciones, Amonestados y Expulsados --}}
@foreach(['Sustituciones'=>'subs','Amonestados'=>'amon','Expulsados'=>'exp'] as $titulo=>$prefijo)
<h2 class="text-white text-xl font-bold text-center mb-4">{{ $titulo }}</h2>
<div class="grid grid-cols-2 gap-6 mb-6">
    @foreach(['Local','Visitante'] as $tipo)
    @php
        $equipo = strtolower($tipo);
        $items = $partido[$prefijo.'_'.$equipo] ?? [];
    @endphp
    <div>
        <h3 class="text-white font-semibold text-center mb-2">{{ $partido['equipo_'.$equipo]['nombre'] ?? $tipo }}</h3>
        <button type="button" onclick="agregarFila('{{ $prefijo }}{{ $tipo }}')" style="background-color:#D9D9D9;" class="w-full text-black px-3 py-2 rounded-xl mb-2">Agregar</button>
        <div id="{{ $prefijo }}{{ $tipo }}">
            @if($titulo=='Sustituciones')
            <div class="grid grid-cols-4 text-black font-bold px-4 py-2 rounded-tl-3xl rounded-br-3xl text-center" style="background-color:#D9D9D9;">
                <div>N° Cam.</div><div>Nombre</div><div>Sale</div><div>Entra</div>
            </div>
            @else
            <div class="grid grid-cols-4 text-black font-bold px-4 py-2 rounded-tl-3xl rounded-br-3xl text-center" style="background-color:#D9D9D9;">
                <div>N° Cam.</div><div>Nombre</div><div>Razón</div><div>Minuto</div>
            </div>
            @endif

            @foreach($items as $item)
            <div class="grid grid-cols-4 bg-white text-black px-4 py-2 text-center rounded-tl-3xl rounded-br-3xl font-medium mt-2 items-center">
                @foreach($item as $valor)
                <input type="text" value="{{ $valor }}" class="border rounded px-2 py-1 text-center" name="{{ $prefijo }}{{ $tipo }}[][]">
                @endforeach
                <button type="button" onclick="confirmarEliminar(this)" class="text-red-600 font-bold">X</button>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endforeach

{{-- Observaciones --}}
<h2 class="text-white text-xl font-bold text-center mb-2">Observaciones</h2>
<div class="w-1/2 mx-auto mb-4">
    <textarea name="observaciones" rows="4" placeholder="Observaciones del partido"
        class="w-full px-4 py-2 rounded-xl border border-gray-300 text-black">{{ $partido['observaciones'] ?? '' }}</textarea>
</div>

{{-- Delegados --}}
<h2 class="text-white text-xl font-bold text-center mb-2">Delegados de Campo</h2>
<div class="w-1/2 mx-auto mb-6">
    <input type="text" name="delegado_local" value="{{ $partido['delegados']['local'] ?? '' }}" placeholder="Delegado Local"
           class="w-full px-4 py-2 rounded-xl border border-gray-300 text-center text-black mb-2">
    <input type="text" name="delegado_visitante" value="{{ $partido['delegados']['visitante'] ?? '' }}" placeholder="Delegado Visitante"
           class="w-full px-4 py-2 rounded-xl border border-gray-300 text-center text-black">
</div>

{{-- Botón Guardar --}}
<div class="flex justify-center mb-6">
    <button type="submit" class="bg-blue-900 text-white font-bold px-8 py-3 rounded-full shadow-lg hover:bg-blue-700 transition">
      Guardar Reporte
    </button>
</div>

<script>
function confirmarEliminar(btn){
    if(confirm("¿Estás seguro de eliminar esta fila?")){
        btn.closest('.grid').remove();
    }
}

function agregarGol(contenedorId) {
    const contenedor = document.getElementById(contenedorId);
    const div = document.createElement('div');
    div.classList.add('grid','grid-cols-4','bg-white','text-black','px-4','py-2','text-center','rounded-tl-3xl','rounded-br-3xl','font-medium','mt-2','items-center');
    div.innerHTML = `
        <input type="text" name="${contenedorId}[][numero]" placeholder="N° Cam" class="border rounded px-2 py-1 text-center">
        <input type="text" name="${contenedorId}[][nombre]" placeholder="Nombre" class="border rounded px-2 py-1 text-center">
        <input type="number" name="${contenedorId}[][minuto]" placeholder="Minuto" class="border rounded px-2 py-1 text-center">
        <div class="flex items-center justify-center gap-2 relative">
            <input type="checkbox" name="${contenedorId}[][valido]" class="mx-auto">
            <button type="button" class="text-red-600 font-bold" onclick="confirmarEliminar(this)" title="Confirmar eliminación">X</button>
        </div>
    `;
    contenedor.appendChild(div);
}

function agregarFila(contenedorId) {
    const contenedor = document.getElementById(contenedorId);
    const div = document.createElement('div');
    div.classList.add('grid','grid-cols-4','bg-white','text-black','px-4','py-2','text-center','rounded-tl-3xl','rounded-br-3xl','font-medium','mt-2','items-center');
    div.innerHTML = `
        <input type="text" placeholder="N° Cam" class="border rounded px-2 py-1 text-center">
        <input type="text" placeholder="Nombre" class="border rounded px-2 py-1 text-center">
        <input type="text" placeholder="Sale/razón" class="border rounded px-2 py-1 text-center">
        <input type="text" placeholder="Entra/Minuto" class="border rounded px-2 py-1 text-center">
        <button type="button" class="text-red-600 font-bold" onclick="confirmarEliminar(this)">X</button>
    `;
    contenedor.appendChild(div);
}
</script>

@endsection
