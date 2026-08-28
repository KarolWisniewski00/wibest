<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            <li>
                <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                    Edycja balansu rocznego urlopu użytkownika.
                </div>
                <div class="relative">
                    <div class="p-2 pt-0 text-sm rounded-lg">
                        <div class="flex flex-col gap-4">
                            <span class="text-gray-900 dark:text-white">👤 Dla użytkownika</span>
                            <label
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">

                                <div class="flex items-center gap-2">
                                    <x-user-photo :user="$leave->user" />
                                    <x-user-name :user="$leave->user" class="flex-wrap" />
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4 flex-wrap">
                        <span class="text-gray-900 dark:text-white">📅 Zakres</span>
                        <x-status-cello>
                            {{ $leave->year }}
                        </x-status-cello>
                    </div>
                </div>
            </li>
        </x-sidebar-left>
        <!--SIDE BAR-->

        <!--MAIN-->
        <x-main>
            <x-leave.nav :role="$role" :leavePending="$leavePending" />

            <!--CONTENT-->
            <div class="p-4">
                <!--POWRÓT-->
                <x-button-link-back href="{{ route('leave.balance.index') }}" class="text-lg mb-4">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy
                </x-button-link-back>
                <!--POWRÓT-->
                <h2 class="text-xl font-semibold dark:text-white mb-4"><span>🏖️</span> Urlopy – <x-status-cello>{{ $leave->year }}</x-status-cello></h2>
                <form method="POST" action="{{ route('leave.balance.update', $leave) }}">
                    @csrf
                    @method('PUT')
                    <div class="mt-4" id="leave-settings">
                        <div
                            class="bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 space-y-6">

                            <!-- Dni urlopowe -->
                            <div class="flex flex-col md:flex-row md:items-center gap-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        Ilość dni urlopowych
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Podstawowa liczba dni urlopu przysługująca w tym roku.
                                    </p>
                                </div>
                                <div class="flex items-center gap-2 md:w-48">
                                    <x-my-number name="base_days" min="0" id="base_days" value="{{ $leave->base_days }}" />
                                    <x-status-gray>DNI</x-status-gray>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 dark:border-gray-700"></div>

                            <!-- Z ubiegłego roku -->
                            <div class="flex flex-col md:flex-row md:items-center gap-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        Dni z ubiegłego roku
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Niewykorzystane dni przeniesione z poprzedniego roku.
                                    </p>
                                </div>
                                <div class="flex items-center gap-2 md:w-48">
                                    <x-my-number name="carried_over" id="carried_over" min="0"
                                        value="{{ $leave->carried_over }}" />
                                    <x-status-gray>DNI</x-status-gray>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 dark:border-gray-700"></div>

                            <!-- Wykorzystane -->
                            <div class="flex flex-col md:flex-row md:items-center gap-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        Wykorzystane dni
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Liczba dni urlopu, które zostały już wykorzystane.
                                    </p>
                                </div>
                                <div class="flex items-center gap-2 md:w-48">
                                    <x-my-number name="used_days" id="used_days" min="0" value="{{ $leave->used_days }}" />
                                    <x-status-orange>DNI</x-status-orange>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 dark:border-gray-700"></div>

                            <!-- Pozostało -->
                            <div class="flex flex-col md:flex-row md:items-center gap-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        Pozostało dni urlopu
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Aktualna liczba dni, które użytkownik może jeszcze wykorzystać.
                                    </p>
                                </div>
                                <div class="flex items-center gap-2 md:w-48">
                                    <div
                                        class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 font-semibold w-full text-center">
                                        <span
                                            id="remaining_days">{{ ($leave->carried_over + $leave->base_days) - $leave->used_days }}</span>
                                    </div>
                                    <x-status-gray>DNI</x-status-gray>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--ZAPISZ-->
                    <div class="flex justify-end mt-4">
                        <x-button-green type="submit" class="text-lg">
                            <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                        </x-button-green>
                    </div>
                    <!--ZAPISZ-->
                </form>
            </div>
            <!--CONTENT-->
        </x-main>
        <!--MAIN-->
        <script>
            $(document).ready(function () {

                function calculateDays() {
                    let base = parseInt($('#base_days').val()) || 0;
                    let carried = parseInt($('#carried_over').val()) || 0;
                    let used = parseInt($('#used_days').val()) || 0;

                    let result = (base + carried) - used;

                    $('#remaining_days').text(result);
                }

                // odpal na start
                calculateDays();

                // reaguj na zmiany
                $('#base_days, #carried_over, #used_days').on('input', function () {
                    calculateDays();
                });

            });
        </script>
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>