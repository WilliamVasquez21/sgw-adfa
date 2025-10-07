<div class="w-full mx-auto">
  <div class="bg-gradient-to-r from-[#003e95] to-[#005fd1] rounded-[26px_0_0_0] text-white text-center">
    <h2 class="py-2.5 px-4 font-semibold text-xs md:text-[13px] tracking-wide whitespace-nowrap m-0">
      TEMPORADA REGULAR | ACUMULADA
    </h2>
  </div>


<div class="overflow-x-auto scrollbar-thin scrollbar-thumb-blue-900 scrollbar-track-transparent">
  <div class="bg-gradient-to-r from-[#003e95] to-[#005fd1] rounded-tr-[0] rounded-br-[26px] text-white overflow-hidden min-w-max">
    <div class="w-full">
      <div class="grid gap-1.5 font-semibold text-[13px] py-2 px-4 text-center items-center whitespace-nowrap"
           style="grid-template-columns: 40px 200px repeat(11, 50px) 70px;">
        <span>N</span>
        <span class="text-left pl-4">NOMBRE DEL ATLETA</span>
        @foreach ($jornadas as $jornada)
        <span>J{{ $jornada }}</span>
        @endforeach
        <span>TOTAL</span>
      </div>
    </div>
  </div>
    
    <div class="mt-3 flex flex-col gap-2.5">
      @foreach ($goleadores as $index => $goleador)
      <div class="grid gap-1.5 items-center bg-white shadow-lg py-2 px-4 rounded-[26px_0_26px_0] min-w-max whitespace-nowrap"
           style="grid-template-columns: 40px 200px repeat(11, 50px) 70px;">
        <div class="text-center text-[13px] font-bold text-[#003e95]">
          {{ $index + 1 }}
        </div>

        <div class="flex items-center gap-2.5 font-semibold text-left pl-4 text-[13px] overflow-hidden text-ellipsis">
          <span>{{ strtoupper($goleador['nombre']) }}</span>
        </div>

        @foreach ($jornadas as $jornada)
        <div class="text-center text-[13px] font-medium">
          {{ $goleador['jornadas'][$jornada] ?? 0 }}
        </div>
        @endforeach

        <div class="flex justify-center items-center">
          <div class="w-10 h-10 rounded-full bg-[#004aad] text-white flex justify-center items-center font-bold text-sm flex-shrink-0">
            {{ $goleador['total'] }}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>