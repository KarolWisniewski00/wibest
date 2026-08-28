<div>
    @if($type != '')
    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4">
        <span class="text-gray-900 dark:text-white">📋 Podgląd</span>
        <div class="h-[180px] flex flex-col items-center justify-center text-center 
                            w-full bg-pink-200 dark:bg-pink-400/60
                            rounded-2xl p-2 transition-colors duration-200 
                            hover:bg-pink-300 dark:hover:bg-pink-500/70">

            <!-- Ikona i label -->
            <div class="flex flex-col items-center justify-center h-full w-fit">
                <span class="text-2xl">{{ config('leavetypes.icons.' . $type, '') ?? '' }}</span>
                <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-pink-300 text-gray-900 uppercase tracking-widest">
                    {{ config('leavetypes.shortType.' . $type, '') }}
                </span>
            </div>

            <!-- Dane szczegółowe -->
            <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                <div class="font-semibold tracking-widest uppercase">
                    {{$type}}
                </div>

                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                    @if($start_time_date != '')
                    {{
                        \Carbon\Carbon::parse($start_time_date)
                            ->locale('pl')
                            ->translatedFormat('D') 
                    }}
                    @else
                    Brak
                    @endif
                    –
                    @if($end_time_date != '')
                    {{
                        \Carbon\Carbon::parse($end_time_date)
                            ->locale('pl')
                            ->translatedFormat('D') 
                    }}
                    @else
                    Brak
                    @endif
                </div>
            </div>

            <!-- Opis -->
            <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                WNIOSEK
            </p>

        </div>
    </div>
    @endif
</div>