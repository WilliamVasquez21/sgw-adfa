<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página en construcción</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-700 to-green-900 text-white min-h-screen flex items-center justify-center">

  <div class="text-center p-8 bg-black bg-opacity-70 rounded-2xl shadow-xl max-w-lg">
    <!-- Ícono balón de fútbol -->
    <div class="text-6xl mb-4">⚽</div>

    <!-- Título -->
    <h1 class="text-3xl font-bold mb-4">¡Página en construcción!</h1>

    <!-- Mensaje descriptivo -->
    <p class="text-lg mb-6">
      Esta sección aún no está disponible. Estamos entrenando duro para que pronto esté lista para jugar.
    </p>

    <!-- Botón de regreso -->
    <a href="{{ route('modulo.arbitral') }}" class="inline-block bg-yellow-400 text-black font-bold px-6 py-3 rounded-full hover:bg-yellow-500 transition">
      Volver al módulo arbitral
    </a>

    <!-- Pie futbolístico -->
    <div class="mt-6 text-sm text-gray-300 italic">
      ⚽ SGWADFA · Siempre en juego
    </div>
  </div>

</body>
</html>
