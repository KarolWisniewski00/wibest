<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />

        <!--CONTENT-->
        <x-container-content-form>

            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.user', $user) }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <x-header-form>
                <span>📋</span> Edytuj firmę użytkownika
            </x-header-form>

            <!--FORMULARZ-->
            <form method="POST" action="{{route('setting.user.update-company', $user)}}">
                @csrf
                @method('PUT')
                <style>
                    @media (prefers-color-scheme: dark) {
                        .ts-dropdown .active {
                            background-color: rgb(75 85 99) !important;
                            color: #fff !important;
                        }

                        .ts-dropdown {
                            border: 1px solid rgb(75 85 99) !important;
                            border-radius: 0.5rem !important;
                        }

                        .option {
                            padding-left: 12px !important;
                        }

                        .ts-control {
                            background-color: rgb(55 65 81) !important;
                            border: 1px solid rgb(75 85 99) !important;
                            border-radius: 0.5rem !important;
                            min-height: 46px !important;
                            color: #fff !important;
                            font-size: 1.125rem !important;
                            line-height: 1.75rem !important;
                            padding-left: 12px !important;
                        }

                        .ts-control input {
                            color: #fff !important;
                            margin: auto 0 !important;
                            font-size: 1.125rem !important;
                            line-height: 1.75rem !important;
                        }

                        .item {
                            margin: auto 0 !important;
                        }
                    }
                </style>
                <div class="mt-2">
                    <label for="company"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🏢</span> Nazwa firmy
                    </label>
                    <select id="company" name="company" autocomplete="off" class="mt-2 rounded-lg text-lg">
                        <option value="">Wybierz firmę</option>
                        @foreach($companies as $company)
                            <option value="{{ $company['id'] }}" data-description="{{ $company['description'] }}" {{ $company['id'] == $user->company_id ? 'selected' : '' }}>
                                🏢 {{ $company['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <script>
                    $(document).ready(function () {
                        // inicjalizacja TomSelect
                        let companySelect = new TomSelect('#company', {
                            maxItems: 1,
                            render: {
                                option: function (data, escape) {
                                    return `
                                    <div class="px-3 py-2 dark:bg-gray-700 dark:text-white">
                                        <div class="text-lg">${escape(data.text)}</div>
                                        <div class="opacity-70 text-xs">${escape(data.description || '')}</div>
                                    </div>
                                `;
                                },
                                item: function (data, escape) {
                                    return `<div>${escape(data.text)}</div>`;
                                }
                            },
                        });
                    });
                </script>

                <!-- RESETY -->
                <div class="mt-2 flex flex-col">
                    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300">🧹 Opcje resetowania danych</h3>

                    <!-- Resetuj urlopy planowane -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="reset_planned_holidays" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Resetuj urlopy planowane
                        </span>
                    </label>

                    <!-- Resetuj wnioski -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="reset_requests" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Resetuj wnioski
                        </span>
                    </label>

                    <!-- Resetuj RCP -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="reset_rcp" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Resetuj RCP
                        </span>
                    </label>

                    <!-- Resetuj planing -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="reset_planning" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Resetuj planing
                        </span>
                    </label>
                </div>
                <!-- RESETY -->

                <!--ZAPISZ-->
                <div class="flex justify-end mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>
                <!--ZAPISZ-->
            </form>
            <!--Formularz-->
        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
</x-app-layout>