<div class="mb-4 @if($type == 'second') hidden lg:block @endif">

    @if($type == 'first')
    <x-label-form for="datepicker" value="📅 Zakres dat od" />
    @endif
    @if($type == 'second')
    <x-label-form for="datepicker" value="📅 Zakres dat do" />
    @endif
    <div class="relative mb-4 border-gray-300 @if($type == 'second') flex lg:hidden @endif">
        <input
            value="@if($type == 'first')@if($startDate){{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}}@endif @else @if($endDate){{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}@endif @endif"
            type="text"
            id="start"
            placeholder=""
            readonly
            class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
        <span
            id="toggleDatepicker"
            class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
            <i class="fa-solid fa-calendar-days"></i>
        </span>
    </div>
    @if($calendar == 'single')
    <x-label-form for="datepicker" value="📅 Zakres dat do" />
    @endif
    <div class="relative mb-4 border-gray-300 @if($type == 'first') flex @if($calendar != 'single') lg:hidden @endif @endif ">
        <input
            value="@if($endDate){{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}} @endif"
            type="text"
            id="start"
            placeholder=""
            readonly
            class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
        <span
            id="toggleDatepicker"
            class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
            <i class="fa-solid fa-calendar-days"></i>
        </span>
    </div>
    <div class="flex justify-between items-center my-4 px-1 ">
        <span class="text-md md:text-lg font-bold text-gray-900 dark:text-white">{{ $monthName }}</span>
        <div class="space-x-2">
            <button wire:click="goToPreviousMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                <i class="fa-solid fa-chevron-left"></i><span class="mx-1">pop</span>
            </button>
            <button wire:click="goToNextMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                <span class="mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <div class="flex-col w-full ">
        <div class="grid grid-cols-7 gap-px w-full overflow-hidden text-xs font-medium rounded-lg">
            {{-- Nagłówki dni tygodnia --}}
            @foreach (['PON', 'WT', 'ŚR', 'CZW', 'PT', 'SOB', 'NDZ'] as $dayName)
            <div class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white py-2 m-0.5 text-center rounded-lg tracking-widest">
                {{ $dayName }}
            </div>
            @endforeach

            @foreach ($weeks as $week)
            @foreach ($week as $day)
            @php
            $dateStr = $day['date']->format('Y-m-d');
            $isStart = $dateStr === $startDate;
            $isEnd = $dateStr === $endDate;
            $isInRange = $this->isDateInRange($dateStr);
            if($work_session && !$workSessionId){
            $isTaken = $day['leave'] || ($day['rcp'] && $day['rcp']->night == false) || $day['isHoliday'] || ($day['work_block'] == 'work');
            }elseif($work_session && $workSessionId){
            $isTaken = $day['leave'] || $day['isHoliday'] || ($day['work_block'] == 'work');
            }else{
            $isTaken = $day['leave'] || $day['rcp'] || $day['isHoliday'] || ($day['work_block'] == 'work');
            }
            $isWarning = $day['isHoliday'];

            // Określenie klasy podświetlenia
            $highlightClass = '';
            if ($isStart || $isEnd) {
            if ($isTaken) {
            //brzegi
            $highlightClass = 'border-rose-300 bg-rose-100 dark:bg-rose-900/70';
            } else{
            $highlightClass = 'border-green-300 bg-green-100 dark:bg-green-900/70';
            }

            } elseif ($isInRange) {
            //wśrodku
            if ($isTaken) {
            $highlightClass = 'border-rose-300 bg-rose-50 dark:bg-rose-950/70';
            if ($isWarning) {
            $highlightClass = 'border-green-300 bg-green-50 dark:bg-green-950/70';
            }

            } else{
            $highlightClass = 'border-green-300 bg-green-50 dark:bg-green-950/70';
            }
            } else {
            //niezaznaczone
            if ($isTaken) {
            $highlightClass = 'border-gray-200 dark:border-gray-800 hover:border-rose-300';
            if ($isWarning) {
            $highlightClass = 'border-gray-200 dark:border-gray-800 hover:border-rose-300';
            }

            } else{
            $highlightClass = 'border-gray-200 dark:border-gray-800 hover:border-green-300';
            }

            }

            // Klasa dla nieaktywnych miesięcy (poza bieżącym)
            $isOtherMonth = !$day['date']->isSameMonth($this->currentMonth);
            if ($isOtherMonth) {
            $highlightClass .= ' opacity-50 pointer-events-none';
            }
            @endphp

            <button
                type="button"
                wire:click="@if(!$isTaken && !$isOtherMonth) selectDate('{{ $dateStr }}') @endif"
                wire:key="day-{{ $dateStr }}"
                class="
                     dark:bg-gray-900 h-28 w-full relative p-2 border-2 rounded-lg transition duration-150 ease-in-out
                    flex flex-col items-start justify-start shadow-sm
                    {{ $highlightClass }}
                ">
                <div class="flex flex-col items-start justify-start">
                    @if ($day['date']->isToday())
                    <div class="text-gray-900 bg-rose-300 dark:bg-rose-300 rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold mb-1">
                        {{ $day['date']->day }}
                    </div>
                    @else
                    <div class="text-gray-900 dark:text-white rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold mb-1">
                        {{ $day['date']->day }}
                    </div>
                    @endif
                </div>

                {{-- Wyświetlanie statusu (RCP/Urlop/Święto/Blok) --}}
                @if ($day['rcp'])
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                    <span class="text-lg md:text-xl">
                        @if($day['rcp']->night == true)
                        🌙
                        @else
                        ⏱️
                        @endif
                    </span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        RCP
                    </span>
                </div>
                @elseif ($day['leave'])
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                    <span class="text-lg md:text-xl">{{ config('leavetypes.icons.' . $day['leave'], '') }}</span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        {{ config('leavetypes.shortType.' . $day['leave'], '') }}
                    </span>
                </div>
                @elseif ($day['work_block'])
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                    <span class="text-lg md:text-xl">
                        @if($day['work_block'] == 'night')
                        🌙
                        @else
                        🌀
                        @endif
                    </span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-violet-300 dark:bg-violet-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        ZMI
                    </span>
                </div>
                @elseif ($day['multi'])
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2 opacity-50">
                    <span class="text-lg md:text-xl">{{ config('leavetypes.icons.' . 'święto', '') }}</span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        {{ config('leavetypes.shortType.' . 'święto', '') }}
                    </span>
                </div>
                @elseif ($day['isHoliday'])
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                    <span class="text-lg md:text-xl">{{ config('leavetypes.icons.' . 'święto', '') }}</span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        {{ config('leavetypes.shortType.' . 'święto', '') }}
                    </span>
                </div>
                @elseif($isStart || $isEnd)
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-gray-200 dark:bg-gray-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        {{$isStart ? 'OD' : ''}}
                        {{$isEnd ? "DO" : ''}}
                    </span>
                </div>
                @endif
            </button>
            @endforeach
            @endforeach
        </div>
    </div>
</div>