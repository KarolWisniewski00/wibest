<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Klienci') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--WIDGET TASK-->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Klienci
                        </h1>
                        @if ($company)
                        <a href="{{ route('client.create') }}" class="mt-8 mb-4 inline-flex items-center justify-center w-10 h-10 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                        @else
                        @endif
                    </div>
                    <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8">
                        @if ($company)
                        <ul class="grid w-full gap-y-4 block md:hidden">
                            @if ($clients->isEmpty())
                            <div class="text-center py-8">
                                <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                <p class="text-gray-500 dark:text-gray-400">Brak klientów do wyświetlenia.</p>
                            </div>
                            @else
                            @foreach ($clients as $client)
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-lg font-semibold dark:text-gray-50">{{ $client->name }}</span>
                                            <form action="{{route('client.delete', $client)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $client->adress }}</div>
                                        <div class="flex space-x-4 mt-4">
                                            <a href="{{route('client.show', $client)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{route('client.edit', $client)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{route('invoice.create.client', $client)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-green-600 border border-green-600 rounded-lg hover:bg-green-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300">
                                                <i class="fa-solid fa-file-invoice mr-2"></i>Nowa Faktura
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>

                        <!-- Tabelaryczny widok klientów (desktop) -->
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden md:table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nazwa</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Telefon</th>
                                    <th scope="col" class="px-6 py-3">Adres</th>
                                    <th scope="col" class="px-6 py-3">Podgląd</th>
                                    <th scope="col" class="px-6 py-3">Edycja</th>
                                    <th scope="col" class="px-6 py-3">Usuwanie</th>
                                    <th scope="col" class="px-6 py-3">Nowa Faktura</th> <!-- Dodana kolumna -->
                                </tr>
                            </thead>
                            <tbody>
                                @if ($clients->isEmpty())
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="8" class="px-6 py-4">
                                        <div class="text-center py-8">
                                            <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                            <p class="text-gray-500 dark:text-gray-400">Brak klientów do wyświetlenia.</p>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                @foreach ($clients as $client)
                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $client->name }}</td>
                                    <td class="px-6 py-4"><a href="mailto:{{ $client->email }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->email }}</a></td>
                                    <td class="px-6 py-4"><a href="tel:{{ $client->phone }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->phone }}</a></td>
                                    <td class="px-6 py-4">{{ $client->adress }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('client.show', $client)}}" class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('client.edit', $client)}}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form class="" action="{{route('client.delete', $client)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('invoice.create.client', $client)}}" class="text-green-600 border border-green-600 hover:bg-green-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                            <i class="fa-solid fa-file-invoice"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                        <div class="md:px-2 py-4">
                            {{ $clients->links() }}
                        </div>

                        @else
                        <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <h3 class="text-lg font-medium">Dokończ konfigurację</h3>
                            </div>
                            <div class="mt-2 mb-4 text-sm">
                                Brak danych sprzedawcy. Dodaj informacje o firmie. Przejdź do zakładki ustawienia i kliknij zielony plus
                            </div>
                            <div class="flex">
                                <a href="{{route('setting.create')}}" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                    Przejdź do konfiguracji
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- Paginacja -->
                    <div class="md:px-2 py-4">
                        {{ $clients->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
</x-app-layout>