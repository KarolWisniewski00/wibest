<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                Edytujesz element RCP w którego skład wchodzą dwa mniejsze zdarzenia START i STOP. Nie można utworzyć zdarzenia START lub STOP bez edytowania RCP.
            </div>
        </li>
        <li>
            <livewire:date-start-end-picker />
        </li>
        <li>
            <livewire:time-and-type-picker />
        </li>
        <li>
            <livewire:users-picker />
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-RCP.nav :countEvents="$countEvents"/>
        <!--CONTENT-->
        <div class="p-4">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('rcp.work-session.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-50 mb-4 text-center">Edycja Pracy RCP</h2>
            <!--POWRÓT-->
            <span>
                @csrf
                <livewire:edit-rcp-wizard workSessionId="{{$work_session->id}}" />
                <!-- Dane ogólne -->
            </span>

        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>