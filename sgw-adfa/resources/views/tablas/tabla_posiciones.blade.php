<div class="w-full mx-auto">
  <div class="bg-gradient-to-r from-[#003e95] to-[#005fd1] rounded-[28px_0_28px_0] text-white overflow-hidden">
    <div class="text-center py-2.5 px-4">
      <h2 class="font-semibold text-[13px] tracking-wide m-0">
        TEMPORADA REGULAR | ACUMULADA
      </h2>
    </div>

    <div class="grid gap-0 font-semibold text-[13px] py-2 px-4 text-center items-center"
         style="grid-template-columns: 40px 1.6fr repeat(7, 1fr) 60px;">
      <span>N</span>
      <span class="text-left pl-4">EQUIPO</span>
      <span>J</span>
      <span>G</span>
      <span>E</span>
      <span>P</span>
      <span>F</span>
      <span>C</span>
      <span>DIF</span>
      <span>PTS</span>
    </div>
  </div>


  <div class="mt-3 flex flex-col gap-2.5">
    @foreach ($tabla as $equipo)
    <div class="grid gap-0 items-center bg-white shadow-lg py-2 px-4 rounded-[26px_0_26px_0]"
         style="grid-template-columns: 40px 1.6fr repeat(7, 1fr) 60px;">
      <div class="text-center text-[13px] font-bold text-[#003e95]">
        {{ $equipo['posicion'] }}
      </div>

      <div class="flex items-center gap-2.5 font-semibold text-left">
        <img src="{{ asset($equipo['logo']) }}" alt="logo" class="w-8 h-8 rounded-full border-2 border-[#004aad]">
        <span class="text-[13px]">{{ $equipo['equipo'] }}</span>
      </div>

      <div class="text-center text-[13px] font-medium">{{ $equipo['pj'] }}</div>
      <div class="text-center text-[13px] font-medium">{{ $equipo['pg'] }}</div>
      <div class="text-center text-[13px] font-medium">{{ $equipo['pe'] }}</div>
      <div class="text-center text-[13px] font-medium">{{ $equipo['pp'] }}</div>
      <div class="text-center text-[13px] font-medium">{{ $equipo['gf'] }}</div>
      <div class="text-center text-[13px] font-medium">{{ $equipo['gc'] }}</div>
      <div class="text-center text-[13px] font-medium">{{ $equipo['dif'] }}</div>

      <div class="flex justify-center items-center">
        <div class="w-9 h-9 rounded-full bg-[#004aad] text-white flex justify-center items-center font-bold text-sm">
          {{ $equipo['pts'] }}
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>