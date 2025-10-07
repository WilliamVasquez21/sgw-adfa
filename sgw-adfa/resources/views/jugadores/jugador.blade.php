@extends('layouts.app')

@section('content')

<div class="mx-auto min-h-screen bg-cover bg-center flex items-center justify-center px-4 rounded-lg"
    style="background-image: url('/images/cancha.jpg');">

    <div class="bg-transparent p-8 rounded-2xl shadow-lg w-full max-w-3xl">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-white text-shadow text-gray-800 mb-6">NUEVO JUGADOR</h2>
        <div class="flex justify-center mb-6">
            <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center overflow-hidden shadow">
                <img src="https://img.icons8.com/ios/100/image--v1.png"
                    alt="Jugador"
                    class="w-16 h-16 object-cover">
            </div>
        </div>

        <form action="{{ route('jugadores.create') }}" method="POST" class="space-y-4">
            @csrf

            <input type="text" name="nombre" placeholder="Nombre de jugador"
                class="w-full px-4 py-2 rounded border bg-white text-gray-800 focus:outline-none focus:ring-2 rounded-2xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input id="fechaNacimiento" type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento"
                    class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl" onchange="verificarEdad()">
                <input type="text" name="lugar_nacimiento" placeholder="Lugar de nacimiento"
                    class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
            </div>

            <input type="text" name="direccion" placeholder="Dirección"
                class="w-full px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="telefono" placeholder="Número de teléfono"
                    class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
                <input type="text" name="dui" placeholder="DUI"
                    class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
            </div>

            <input type="email" name="correo" placeholder="Correo electrónico"
                class="w-full px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <select name="estado_civil"
                    class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
                    <option value="">Estado civil</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                </select>

                
            </div>
            <div id="datosResponsable" class="space-y-4 hidden">
                <h3 class="text-xl font-semibold text-center text-white text-shadow text-gray-700 mt-6">Datos del responsable</h3>

                <input type="text" name="responsable_nombre" placeholder="Nombre del responsable"
                    class="w-full px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="date" name="responsable_fecha_nacimiento"
                        class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
                    <input type="text" name="responsable_dui" placeholder="DUI"
                        class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
                </div>

                <input type="text" name="responsable_extendido" placeholder="Extendido en"
                    class="w-full px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
            </div>

            <div class="space-y-4 mt-6">
                <h3 class="text-xl font-semibold text-center text-white text-shadow text-gray-700">Datos del equipo</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="categoria" placeholder="Categoría"
                    class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
                    <input type="text" name="equipo" placeholder="Equipo"
                        class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
                    <input type="text" name="posicion" placeholder="Posición en que juega"
                        class="px-4 py-2 rounded border bg-white text-gray-800 rounded-2xl">
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition rounded-2xl">
                    Registrar Jugador
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
