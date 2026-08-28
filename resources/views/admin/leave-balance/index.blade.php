<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            <x-search-filter />
            <x-filter-date loader="leave-balance" showCalender="false">
                {{ route('api.v1.leave.balance.set.date') }}
            </x-filter-date>
            <input type="hidden" id="start_date" value="{{ $startDate }}">
            <input type="hidden" id="end_date" value="{{ $endDate }}">
            <li>
                <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                    W tej zakładce filtry daty są niedostępne.
                </div>
            </li>
        </x-sidebar-left>
        <!--SIDE BAR-->
        <x-main>
            <x-leave.nav :role="$role" :leavePending="$leavePending" />
            <!--HEADER-->
            <x-leave.header-balance>
                <span>🏖️</span> Urlopy
            </x-leave.header-balance>
            <!--HEADER-->

            <!--CONTENT-->
            <x-container-content>

                <!--PC VIEW-->
                <x-table-sheet :headers="['Nazwa', 'Rok', 'Bazowy', 'Zaległy', 'Wykorzystane', 'Pozostało', 'Edycja']"
                    :items="$leaveBalances" :checkBox="false" :showMobile="true"
                    emptyMessage="Brak użytkowników do wyświetlenia.">
                    @foreach($leaveBalances as $leave)
                        <x-row-leave-balance :leave="$leave" />
                    @endforeach
                    <x-loader-leave-balance id="loader" />
                </x-table-sheet>
                <!--PC VIEW-->
                <x-loader-script>
                    {{ route('api.v1.leave.balance.get') }}
                </x-loader-script>
            </x-container-content>
        </x-main>
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>