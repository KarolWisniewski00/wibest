@props(['leave'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

    <td class="px-2 py-2">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$leave->user" />
            <x-user-name :user="$leave->user" />
        </div>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-leave-status class="status_{{$leave->id}}">
            {{ $leave->status }}
        </x-leave-status>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
        <div class="flex flex-col items-center justify-center h-full w-full">
            <span class="text-lg md:text-xl">
                {{ config('leavetypes.icons.' . $leave->type, '') }}
            </span>
            <x-label-pink class="mt-1">
                {{ config('leavetypes.shortType.' . $leave->type, '') }}
            </x-label-pink>
        </div>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
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
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            @php
            // Ustawienie polskiego locale dla Carbon
            \Carbon\Carbon::setLocale('pl');

            $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $leave->start_date);
            $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $leave->end_date);
            @endphp

            <x-status-cello>
                @if ($startDate->equalTo($endDate))
                {{-- Jeśli daty są takie same: wyświetl Dzień.Miesiąc, NazwaDniaTygodnia --}}
                {{ $startDate->isoFormat('DD.MM, dddd') }}
                @else
                {{-- Jeśli daty są różne: wyświetl zakres dat --}}
                {{ $startDate->format('d.m') }} - {{ $endDate->format('d.m') }}
                @endif
            </x-status-cello>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2">
        @if($leave->status == 'zaakceptowane' || $leave->status == 'zrealizowane')
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
        @endif
    </td>
    <td class="px-2 py-2">
        <x-button-link-blue href="{{route('leave.pending.edit', $leave)}}"
            class="min-h-[38px] is_used_{{$leave->id}} {{$leave->is_used ? 'hidden' : ''}}">
            <i class="fa-solid fa-pen-to-square"></i>
        </x-button-link-blue>
    </td>
    <td class="px-3 py-2">
        @if($leave->status == 'odblokowane' || $leave->status == 'oczekujące' || $leave->status == 'odrzucone' || $leave->status == 'anulowane')
        <x-button-link-green href="{{ route('leave.pending.accept', $leave)}}"
            class="min-h-[38px] is_used_{{$leave->id}} {{$leave->is_used ? 'hidden' : ''}}">
            <i class="fa-solid fa-check"></i>
        </x-button-link-green>
        @endif
    </td>
    <td class="px-3 py-2">
        @if($leave->status == 'odblokowane' || $leave->status == 'oczekujące' || $leave->status == 'zaakceptowane' || $leave->status == 'zrealizowane')
        <x-button-link-red href="{{ route('leave.pending.reject', $leave)}}"
            class="min-h-[38px] is_used_{{$leave->id}} {{$leave->is_used ? 'hidden' : ''}}">
            <i class="fa-solid fa-xmark"></i>
        </x-button-link-red>
        @endif
    </td>
</tr>