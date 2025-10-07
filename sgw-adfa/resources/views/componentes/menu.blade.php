<!-- resources/views/components/menu.blade.php -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ open: false }">
  <!-- Botón hamburguesa -->
  <div 
    @click="open = !open"
    class="fixed top-6 left-4 z-50 w-12 h-12 flex items-center justify-center rounded-full border-2 border-black bg-white text-black text-2xl font-bold shadow-md cursor-pointer transition-transform hover:scale-105 hover:rotate-6"
    x-text="open ? '←' : '☰'">
  </div>

  <!-- Menú lateral -->
  <nav 
    class="fixed top-0 left-0 h-screen w-[90px] bg-white/95 border-r border-gray-300 z-40 pt-6 rounded-tr-3xl rounded-br-3xl transition-all duration-300 overflow-y-auto"
    :class="open ? 'translate-x-0' : '-translate-x-[90px]'"
    x-transition>
    
    <div class="flex flex-col items-center space-y-4">
      <!-- Logo -->
      <img src="{{ asset('img/im.png') }}" alt="Logo ADFA" class="w-16 h-auto mb-4" />

      <!-- Íconos con enlaces -->
      <a href="{{ route('home') }}">
        <img src="{{ asset('img/1.png') }}" alt="Inicio" class="w-10 hover:scale-110 transition-transform duration-150" />
      </a>
      <a href="{{ route('analiticas') }}">
        <img src="{{ asset('img/2.png') }}" alt="Analíticas" class="w-10 hover:scale-110 transition-transform duration-150" />
      </a>
      <a href=" ">
        <img src="{{ asset('img/3.png') }}" alt="Jugadores" class="w-10 hover:scale-110 transition-transform duration-150" />
      </a>
      <a href="{{ route('equipos') }}">
        <img src="{{ asset('img/4.png') }}" alt="Equipos" class="w-10 hover:scale-110 transition-transform duration-150" />
      </a>
      <a href="{{ route('arbitros') }}">
        <img src="{{ asset('img/5.png') }}" alt="Árbitros" class="w-10 hover:scale-110 transition-transform duration-150" />
      </a>
      <a href="{{ route('torneos') }}">
        <img src="{{ asset('img/6.png') }}" alt="Torneos" class="w-10 hover:scale-110 transition-transform duration-150" />
      </a>
      <a href="{{ route('notificaciones') }}">
        <img src="{{ asset('img/7.png') }}" alt="Notificaciones" class="w-10 hover:scale-110 transition-transform duration-150" />
      </a>
      <a href="{{ route('superusuario') }}">
        <img src="{{ asset('img/8.png') }}" alt="Superusuario" class="w-10 hover:scale-110 transition-transform duration-150" />
      </a>
    </div>
  </nav>
</div>
