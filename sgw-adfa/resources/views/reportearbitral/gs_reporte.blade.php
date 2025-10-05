@include('componentes.menu')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $partido['titulo'] ?? 'Reporte Arbitral' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('img/jw.jpg') }}')">

  <!-- Contenedor principal -->
  <div class="min-h-screen flex flex-col items-center justify-start p-6 space-y-6">

    <!-- Título -->
    <h1 class="text-4xl font-bold text-white text-center drop-shadow-lg">{{ $partido['titulo'] ?? 'Reporte Arbitral' }}</h1>

    <!-- Recuadro principal -->
    <div class="bg-black/70 text-white p-6 w-full max-w-5xl rounded-tr-3xl rounded-bl-3xl">

      <!-- Encabezado Partido con escudos -->
      <div class="flex items-center justify-between mb-8">
        <!-- Equipo Local -->
        <div class="flex flex-col items-center">
            <img src="{{ $partido['equipo_local']['escudo'] ?? asset('img/milan.png') }}" alt="Escudo {{ $partido['equipo_local']['nombre'] ?? 'Milan' }}" class="w-16 h-16 mb-2">
            <p class="text-lg font-semibold text-center text-white">{{ $partido['equipo_local']['nombre'] ?? 'Milan' }}</p>
        </div>

        <!-- Marcador -->
        <div class="flex flex-col items-center mx-4">
            <p class="text-2xl font-bold text-white mb-1">{{ $partido['equipo_local']['goles'] ?? 0 }} - {{ $partido['equipo_visitante']['goles'] ?? 0 }}</p>
            <p class="text-lg font-medium text-white text-center">vs</p>
        </div>

        <!-- Equipo Visitante -->
        <div class="flex flex-col items-center">
            <img src="{{ $partido['equipo_visitante']['escudo'] ?? asset('img/dolar.png') }}" alt="Escudo {{ $partido['equipo_visitante']['nombre'] ?? 'Dolar Juvenil' }}" class="w-16 h-16 mb-2">
            <p class="text-lg font-semibold text-center text-white">{{ $partido['equipo_visitante']['nombre'] ?? 'Dolar Juvenil' }}</p>
        </div>
      </div>

      <!-- Información del partido -->
      <div class="mb-8 text-white space-y-1 text-sm">
          <p><b>Torneo:</b> {{ $partido['informacion']['torneo'] ?? 'Sub 13 El Tránsito 2025' }}</p>
          <p><b>Categoría:</b> {{ $partido['informacion']['categoria'] ?? 'Segunda (Aficionado)' }}</p>
          <p><b>Cancha:</b> {{ $partido['informacion']['cancha'] ?? 'San Carlos' }}</p>
          <p><b>Lugar:</b> {{ $partido['informacion']['lugar'] ?? 'El Tránsito' }}</p>
          <p><b>Fecha:</b> {{ $partido['informacion']['fecha'] ?? '11-05-2025' }}</p>
          <p><b>Hora:</b> {{ $partido['informacion']['hora'] ?? '2:30' }}</p>
          <p><b>Árbitro:</b> {{ $partido['informacion']['arbitro'] ?? 'Gerardo Antonio Solís' }}</p>
          <p><b>Asistentes:</b> {{ $partido['informacion']['asistentes'] ?? 'Herson Santa María, Enrique López' }}</p>
          <p><b>4° Oficial:</b> {{ $partido['informacion']['cuarto'] ?? '-------' }}</p>
      </div>

      <!-- Tabla: Anotadores -->
      <h3 class="text-xl font-bold mb-3 text-white">Anotadores</h3>
      <div class="grid grid-cols-2 gap-6 mb-8">

        <!-- Equipo Local -->
        <div>
          <h4 class="font-semibold text-center mb-2 text-white">{{ $partido['equipo_local']['nombre'] ?? 'Milan' }}</h4>
          <div class="grid grid-cols-3 bg-blue-900 text-white font-bold px-4 py-2 rounded-tl-2xl text-center">
              <div>N° Cam.</div><div>Nombre</div><div>Minuto</div>
          </div>
          @foreach($partido['equipo_local']['jugadores'] ?? [] as $jugador)
          <div class="grid grid-cols-3 bg-white text-black px-4 py-2 text-center rounded-tl-3xl rounded-br-3xl font-medium mt-2">
              <div>{{ $jugador['numero'] }}</div>
              <div>{{ $jugador['nombre'] }}</div>
              <div>{{ $jugador['minuto'] }}</div>
          </div>
          @endforeach
        </div>

        <!-- Equipo Visitante -->
        <div>
          <h4 class="font-semibold text-center mb-2 text-white">{{ $partido['equipo_visitante']['nombre'] ?? 'Dolar Juvenil' }}</h4>
          <div class="grid grid-cols-3 bg-blue-900 text-white font-bold px-4 py-2 rounded-tl-2xl text-center">
              <div>N° Cam.</div><div>Nombre</div><div>Minuto</div>
          </div>
          @foreach($partido['equipo_visitante']['jugadores'] ?? [] as $jugador)
          <div class="grid grid-cols-3 bg-white text-black px-4 py-2 text-center rounded-tl-3xl rounded-br-3xl font-medium mt-2">
              <div>{{ $jugador['numero'] }}</div>
              <div>{{ $jugador['nombre'] }}</div>
              <div>{{ $jugador['minuto'] }}</div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Sustituciones / Amonestados / Expulsados -->
      @foreach (['sustituciones','amonestados','expulsados'] as $tabla)
      <h3 class="text-xl font-bold mb-3 text-white">{{ ucfirst($tabla) }}</h3>
      <div class="grid grid-cols-2 gap-6 mb-8">
        <!-- Equipo Local -->
        <div>
          <h4 class="font-semibold text-center mb-2 text-white">{{ $partido['equipo_local']['nombre'] ?? 'Milan' }}</h4>
          <div class="grid grid-cols-4 bg-blue-900 text-white font-bold px-4 py-2 rounded-tl-2xl text-center">
              <div>N° Cam.</div><div>Nombre</div><div>Sale</div><div>Min.</div>
          </div>
          @foreach($partido['equipo_local'][$tabla] ?? [] as $jugador)
          <div class="grid grid-cols-4 bg-white text-black px-4 py-2 text-center rounded-tl-3xl rounded-br-3xl font-medium mt-2">
              <div>{{ $jugador['numero'] ?? '-' }}</div>
              <div>{{ $jugador['nombre'] ?? '-' }}</div>
              <div>{{ $jugador['sale'] ?? '-' }}</div>
              <div>{{ $jugador['min'] ?? '-' }}</div>
          </div>
          @endforeach
        </div>

        <!-- Equipo Visitante -->
        <div>
          <h4 class="font-semibold text-center mb-2 text-white">{{ $partido['equipo_visitante']['nombre'] ?? 'Dolar Juvenil' }}</h4>
          <div class="grid grid-cols-4 bg-blue-900 text-white font-bold px-4 py-2 rounded-tl-2xl text-center">
              <div>N° Cam.</div><div>Nombre</div><div>Sale</div><div>Min.</div>
          </div>
          @foreach($partido['equipo_visitante'][$tabla] ?? [] as $jugador)
          <div class="grid grid-cols-4 bg-white text-black px-4 py-2 text-center rounded-tl-3xl rounded-br-3xl font-medium mt-2">
              <div>{{ $jugador['numero'] ?? '-' }}</div>
              <div>{{ $jugador['nombre'] ?? '-' }}</div>
              <div>{{ $jugador['sale'] ?? '-' }}</div>
              <div>{{ $jugador['min'] ?? '-' }}</div>
          </div>
          @endforeach
        </div>
      </div>
      @endforeach

      <!-- Observaciones -->
      <h3 class="text-xl font-bold mb-3 text-white">Observaciones:</h3>
      <p class="mb-8 text-white">
        {{ $partido['observaciones'] ?? 'No hay observaciones.' }}
      </p>

      <!-- Delegados -->
      <h3 class="text-xl font-bold mb-3 text-white">Delegados de Campo:</h3>
      <p class="text-white"><b>Local:</b> {{ $partido['delegados']['local'] ?? 'Delegado Milan' }}</p>
      <p class="text-white"><b>Visitante:</b> {{ $partido['delegados']['visitante'] ?? 'Delegado Dolar Juvenil' }}</p>

    </div>
  </div>
</body>
</html>
