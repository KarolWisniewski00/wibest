<x-app-layout>
    @include('admin.elements.alerts')
    @if ($company)
    <div class="p-4">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <!-- WIDGET TASK -->
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <x-setting.nav />
                    <x-setting.header>
                        Klienci
                    </x-setting.header>
                    <x-flex-center class="px-4 pb-4">
                        <div class="relative overflow-x-auto md:shadow sm:rounded-lg mt-8 w-full">

                            <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 hidden lg:table-cell">
                                            <x-flex-center>
                                                <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </x-flex-center>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            Nazwa
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Adres
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            NIP
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Podgląd
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="work-sessions-body">
                                    @if ($companies->isEmpty())
                                    <tr class="bg-white dark:bg-gray-800">
                                        <td colspan="8" class="px-3 py-2">
                                            <div class="text-center py-8">
                                                <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                                <p class="text-gray-500 dark:text-gray-400">Brak danych do wyświetlenia.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($companies as $company)
                                    <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                        <td class="px-3 py-2 hidden lg:table-cell">
                                            <x-flex-center>
                                                <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="{{ $company->id }}">
                                            </x-flex-center>
                                        </td>
                                        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                            <p class="text-gray-900 dark:text-gray-50 font-semibold text-start">
                                                <x-label-link-company href="">
                                                    {{$company->name}}
                                                </x-label-link-company>
                                            </p>
                                        </td>
                                        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                            <x-paragraf-display class="text-xs">
                                                {{$company->adress}}
                                            </x-paragraf-display>
                                        </td>
                                        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                            <x-paragraf-display class="text-xs">
                                                {{$company->vat_number}}
                                            </x-paragraf-display>
                                        </td>
                                        <x-show-cell href="" />
                                    </tr>
                                    @endforeach

                                    @endif
                                </tbody>
                                <div id="loader" class="text-center py-4 hidden text-gray-700 dark:text-gray-50">Ładowanie...</div>
                            </table>
                        </div>
                    </x-flex-center>
                </div>
            </div>
            <!-- END WIDGET TASK -->
        </div>
    </div>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>