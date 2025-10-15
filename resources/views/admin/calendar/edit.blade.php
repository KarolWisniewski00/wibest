<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Edytujesz urlop planowany.
            </div>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-calendar.nav />
        <!--CONTENT-->
        <div class="px-4 py-5 sm:px-6 lg:px-8">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('calendar.all.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do kalendarza urlopu planowanego
            </x-button-link-back>
            <h2 class="text-xl font-semibold dark:text-white mb-4 text-center">Edycja urlop planowany</h2>
            <!--POWRÓT-->
            <span>
                @csrf
                <livewire:edit-planned-leave-wizard :planned-leave-id="$plannedLeave->id" />

                <!-- Dane ogólne -->

            </span>
            <form action="{{route('calendar.all.delete', $plannedLeave->id)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="mt-4 text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-trash mr-2"></i> USUŃ
                </button>
            </form>
        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>