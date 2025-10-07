@include('componentes.menu')
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Notificaciones</title>
  @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('/img/jw.jpg');">
  <div class="min-h-screen bg-transparent py-6">
    <div class="max-w-7xl mx-auto px-4">
      
      <div class="mb-4">
        <h1 class="text-center text-white text-4xl font-extrabold drop-shadow-lg" style="-webkit-text-stroke: 1px black;">Notificaciones</h1>
      </div>
      <div class="w-full mb-6 flex justify-end">
        <form action="{{ route('notificaciones.index') }}" method="GET" class="flex items-center space-x-2">
          <div class="flex items-center bg-white rounded-[28px_0_0_0] shadow-md px-4 py-2 transition-all hover:ring-2 hover:ring-green-500">
            <input
              type="text"
              name="q"
              value="{{ request('q') }}"
              placeholder="Buscar..."
              class="outline-none text-sm text-gray-700 w-40 md:w-56 bg-transparent"
            />
            <button type="submit" class="ml-2 text-gray-500 hover:text-green-600 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 17a6.5 6.5 0 110-13 6.5 6.5 0 010 13z" />
              </svg>
            </button>
          </div>
        </form>
      </div>

      @foreach($groups as $group)
        <h2 class="text-2xl font-extrabold text-white drop-shadow-[0_0_6px_#1c1c1c]" >{{ $group['heading'] }}</h2>

        @foreach($group['items'] as $item)
          @php $isRed = ($item['type'] ?? '') === 'red'; @endphp

          <div class="mb-6">
            <div class="p-5 rounded-xl shadow-lg border-4 {{ $isRed ? 'border-red-600 bg-white/95 hover:bg-red-50' : 'border-green-500 bg-white/95 hover:bg-green-50' }} transition-colors duration-300">
              <h3 class="text-center font-extrabold text-lg leading-tight text-gray-900">{!! $item['title'] !!}</h3>

              @if(!empty($item['is_list']) && is_array($item['desc']))
                <ul class="list-disc list-inside mt-3 text-sm text-gray-700 space-y-1">
                  @foreach($item['desc'] as $line)
                    <li>{{ $line }}</li>
                  @endforeach
                </ul>
                @if(!empty($item['date']))
                  <p class="mt-2 text-xs text-gray-500">{{ $item['date'] }}</p>
                @endif
              @else
                <p class="mt-3 text-sm text-gray-700">{!! $item['desc'] !!}</p>
                <p class="mt-2 text-xs text-gray-500">{{ $item['date'] }}</p>
              @endif
            </div>
          </div>
        @endforeach
      @endforeach

    </div>
  </div>
</body>
</html>
