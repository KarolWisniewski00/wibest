<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Edytujesz wniosek w imieniu użytkownika który nie zmienia swojego statusu po zapisie
            </div>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-leave.nav :role="$role" :leavePending="$leavePending" />
        <!--CONTENT-->
        <div class="px-4 py-5 sm:px-6 lg:px-8">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('leave.pending.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy wniosków
            </x-button-link-back>
            <h2 class="text-xl font-semibold dark:text-white mb-4 text-center">Edycja uniosku</h2>
            <!--POWRÓT-->
            <span>
                @csrf
                <livewire:edit-leave-wizard-user :leave-id="$leave->id"/>
                <!-- Dane ogólne -->

            </span>
            <form action="{{route('leave.single.delete', $leave->id)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-lg mt-4 min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
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