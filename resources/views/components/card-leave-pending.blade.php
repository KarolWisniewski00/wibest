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
                <x-user-photo :user="$leave->user" />
                <x-user-name :user="$leave->user" />
            </div>
            @if($leave->status == 'zaakceptowane' || $leave->status == 'zrealizowane')
            <div class="flex space-x-4">
                <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                    <x-status-gray>
                        Zrealizowano
                    </x-status-gray>
                </x-paragraf-display>
                <label class="inline-flex items-center md:justify-center">
                    <input type="checkbox" class="sr-only peer toggle-status sync-toggle"
                        name="leave_status"
                        data-leave-id="{{ $leave->id }}"
                        @if($leave->is_used == true)
                    checked
                    @endif>
                    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                    peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                    peer-checked:after:border-white
                    after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                    after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                    peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer">
                    </div>
                </label>
            </div>
            @endif
            <div class="flex space-x-4">
                <x-button-link-blue href="{{route('leave.pending.edit', $leave)}}"
                    class="min-h-[38px] is_used_{{$leave->id}} {{$leave->is_used ? 'hidden' : ''}}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </x-button-link-blue>
                @if($leave->status == 'odblokowane' || $leave->status == 'oczekujące' || $leave->status == 'odrzucone' || $leave->status == 'anulowane')
                <x-button-link-green href="{{ route('leave.pending.accept', $leave)}}"
                    class="min-h-[38px] is_used_{{$leave->id}} {{$leave->is_used ? 'hidden' : ''}}">
                    <i class="fa-solid fa-check"></i>
                </x-button-link-green>
                @endif
                @if($leave->status == 'odblokowane' || $leave->status == 'oczekujące' || $leave->status == 'zaakceptowane' || $leave->status == 'zrealizowane')
                <x-button-link-red href="{{ route('leave.pending.reject', $leave)}}"
                    class="min-h-[38px] is_used_{{$leave->id}} {{$leave->is_used ? 'hidden' : ''}}">
                    <i class="fa-solid fa-xmark"></i>
                </x-button-link-red>
                @endif
            </div>
        </div>
    </div>
</li>