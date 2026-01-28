<div>
    @if($start_time_date != '' || $end_time_date != '')
    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4 flex-wrap">
        <span class="text-gray-900 dark:text-white">📅 Zakres</span>
        <x-status-cello>
            @if($start_time_date != '')
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $start_time_date)->format('d.m.Y') ?? ''}}
            @endif
            <span class="px-2">-</span>
            @if($end_time_date != '')
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $end_time_date)->format('d.m.Y') ?? ''}}
            @endif
        </x-status-cello>
    </div>
    @endif
</div>