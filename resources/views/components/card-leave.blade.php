@props(['leave'])
<li>
    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-4">
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start">
                    <x-leave-status class="status_{{$leave->id}}">
                        {{$leave->status}}
                    </x-leave-status>
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs whitespace-nowrap">
                        @php
                        // Ustawienie polskiego locale dla Carbon
                        \Carbon\Carbon::setLocale('pl');

                        $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $leave->start_date);
                        $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $leave->end_date);
                        @endphp

                        <x-status-cello>
                            @if ($startDate->equalTo($endDate))
                            {{ $startDate->isoFormat('DD.MM, dddd') }}
                            @else
                            {{ $startDate->format('d.m') }} - {{ $endDate->format('d.m') }}
                            @endif
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex flex-row justify-start items-start w-fit gap-2">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <span class="text-lg md:text-xl">
                        {{ config('leavetypes.icons.' . $leave->type, '') }}
                    </span>
                    <x-label-pink class="mt-1">
                        {{ config('leavetypes.shortType.' . $leave->type, '') }}
                    </x-label-pink>
                </div>
                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                    <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                        @if($leave->days)
                        <x-status-cello>
                            {{$leave->days}} dni
                        </x-status-cello>
                        @if($leave->working_days != 0 || $leave->non_working_days != 0)
                        <x-status-orange>
                            {{$leave->working_days}} robocze
                        </x-status-orange>
                        <x-status-green>
                            {{$leave->non_working_days}} wolne
                        </x-status-green>
                        @endif
                        @endif
                    </x-paragraf-display>
                    <x-paragraf-display class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                        {{ $leave->type }}
                    </x-paragraf-display>
                </div>
            </div>
            <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                <x-user-photo :user="$leave->manager" />
                <x-user-name :user="$leave->manager" />
            </div>
            <div class="flex space-x-4">
                @if($leave->is_used == false)
                <x-button-link-blue href="{{route('leave.single.edit', $leave)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-pen-to-square"></i>
                </x-button-link-blue>
                @endif
                @if($leave->status == 'oczekujące' || $leave->status == 'zaakceptowane')
                @if($leave->is_used == false)
                <x-button-link-red href="{{ route('leave.pending.cancel', $leave)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-xmark"></i>
                </x-button-link-red>
                @endif
                @endif
            </div>
        </div>
    </div>
</li>