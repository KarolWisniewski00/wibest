<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        <div class="hidden md:flex gap-2">
            <x-button-neutral type="button" class="text-xs" id="download-xlsx">
                <i class="fa-solid fa-download mr-2"></i>Pobierz
            </x-button-neutral>
            @if (Route::is('raport.attendance-sheet.index'))
                <form id="excelForm" method="POST" action="{{ route('raport.attendance-sheet.excel') }}" target="_blank">
                    @csrf
                    <x-button-blue type="button" class="text-xs" id="excel">
                        <i class="fa-solid fa-table mr-2"></i>Edytuj w excel online
                    </x-button-blue>
                    <input type="hidden" name="ids" id="idsInput" value="">
                </form>
            @endif
        </div>
    </x-flex-center>
</x-container-header>
<x-label class="px-4 invisible h-0 md:h-auto md:visible" id="selected-count">
    0 zaznaczonych
</x-label>
<!--HEADER-->