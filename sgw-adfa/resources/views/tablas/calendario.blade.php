<div class="w-full mx-auto">
  <div class="bg-gradient-to-r from-[#003e95] to-[#005fd1] rounded-[28px_0_28px_0] text-white overflow-hidden">
    <div class="text-center py-2 md:py-2.5 px-3 md:px-4">
      <h2 class="font-semibold text-xs md:text-[13px] tracking-wide m-0">CALENDARIZACIÓN</h2>
      <div class="text-[10px] md:text-[11px] mt-1">TEMPORADA REGULAR | ACUMULADA</div>
    </div>


    <div class="hidden md:grid gap-0 font-semibold text-[13px] py-2 px-4 text-center items-center"
         style="grid-template-columns: 100px 80px 1.5fr 1.5fr 120px;">
      <span class="text-left">FECHA</span>
      <span class="text-left">HORA</span>
      <span class="text-left pl-4">LOCAL</span>
      <span class="text-left pl-4">VISITANTE</span>
      <span>RESULTADO</span>
    </div>
  </div>


  <div class="mt-2 md:mt-3 flex flex-col gap-2 md:gap-2.5">
    @foreach ($calendario as $partido)
    <div class="hidden md:grid gap-0 items-center shadow-lg py-3 px-4 rounded-[26px_0_26px_0]
                {{ strtolower($partido['resultado']) === 'por jugarse' ? 'bg-gradient-to-r from-green-400 to-green-500' : 'bg-white' }}"
         style="grid-template-columns: 100px 80px 1.5fr 1.5fr 120px;">
      <div class="text-left text-[13px] font-medium">
        {{ $partido['fecha'] }}
      </div>

      <div class="text-left text-[13px] font-medium">
        {{ $partido['hora'] }}
      </div>

      <div class="text-left pl-4 text-[13px] font-medium">
        {{ $partido['local'] }}
      </div>

      <div class="text-left pl-4 text-[13px] font-medium">
        {{ $partido['visitante'] }}
      </div>

      <div class="flex justify-center items-center">
        @if(strtolower($partido['resultado']) === 'por jugarse')
          <div class="text-black text-[13px] font-bold">
            {{ $partido['resultado'] }}
          </div>
        @else
          <div class="text-black text-[12px] font-semibold rounded-full px-3 py-1 min-w-[80px] text-center">
            {{ $partido['resultado'] }}
          </div>
        @endif
      </div>
    </div>

    <div class="block md:hidden shadow-lg py-3 px-4 rounded-[26px_0_26px_0] space-y-2
                {{ strtolower($partido['resultado']) === 'por jugarse' ? 'bg-gradient-to-r from-green-400 to-green-500' : 'bg-white' }}">
      <div class="flex justify-between items-center pb-2 border-b border-gray-200">
        <div>
          <div class="text-[12px] font-bold">{{ $partido['fecha'] }}</div>
          <div class="text-[11px] text-gray-600">{{ $partido['hora'] }}</div>
        </div>
        @if(strtolower($partido['resultado']) === 'por jugarse')
          <div class="text-black text-[12px] font-bold px-2 py-1">
            {{ $partido['resultado'] }}
          </div>
        @endif
      </div>

      <div class="space-y-2 pt-1">
        @if(strtolower($partido['resultado']) !== 'por jugarse')
          @php
            $goles = explode(' - ', $partido['resultado']);
            $golesLocal = $goles[0] ?? '-';
            $golesVisitante = $goles[1] ?? '-';
          @endphp
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <span class="text-[9px] text-gray-500 font-medium">LOCAL:</span>
              <span class="text-[12px] font-semibold">{{ $partido['local'] }}</span>
            </div>
            <div class="text-[14px] font-bold text-black bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center">
              {{ $golesLocal }}
            </div>
          </div>
          
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <span class="text-[9px] text-gray-500 font-medium">VISIT:</span>
              <span class="text-[12px] font-semibold">{{ $partido['visitante'] }}</span>
            </div>
            <div class="text-[14px] font-bold text-black bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center">
              {{ $golesVisitante }}
            </div>
          </div>
        @else
          <div class="flex items-center">
            <span class="text-[9px] text-gray-500 w-12">LOCAL:</span>
            <span class="text-[12px] font-medium">{{ $partido['local'] }}</span>
          </div>
          <div class="flex items-center">
            <span class="text-[9px] text-gray-500 w-12">VISIT:</span>
            <span class="text-[12px] font-medium">{{ $partido['visitante'] }}</span>
          </div>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</div>