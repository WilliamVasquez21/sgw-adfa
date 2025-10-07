{{-- resources/views/layouts/app.blade.php --}}
@php
    use Carbon\Carbon;
@endphp

@include('componentes.menu')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('titulo', 'Módulo Arbitral')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center min-h-screen" {{--style="background-image: url('{{ asset('img/jw.jpg') }}')"--}}>
  <div class="bg-black bg-opacity-60 min-h-screen p-6">
    @yield('contenido')
  </div>
</body>
</html>
