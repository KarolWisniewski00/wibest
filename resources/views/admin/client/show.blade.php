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
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <a href="{{ route('client') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy Klientów
                    </a>
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Podgląd klienta
                        </h1>
                    </div>
                    <div class="mt-8">
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Nazwa
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $client->name }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                NIP
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $client->vat_number }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Adres
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $client->adress }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Email
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                <a href="maito:{{ $client->email }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->email }}</a>
                                @if($client->email2)
                                <br>
                                <a href="maito:{{ $client->email2 }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->email2 }}</a>
                                @endif
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Telefon
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                <a href="tel:{{ $client->phone }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->phone }}</a>
                                @if($client->phone2)
                                <br>
                                <a href="tel:{{ $client->phone2 }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->phone2 }}</a>
                                @endif
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Uwagi
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $client->notes ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 font-semibold">
                                Utworzone przez
                            </p>
                            <p class="text-gray-900 dark:text-gray-400">
                                {{ $client->user->name ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 font-semibold">
                                Dane należące do
                            </p>
                            <p class="text-gray-900 dark:text-gray-400">
                                {{ $client->company->name ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 font-semibold">
                                Data utworzenia klienta
                            </p>
                            <p class="text-gray-900 dark:text-gray-400">
                                {{ $client->created_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 font-semibold">
                                Data aktualizacji klienta
                            </p>
                            <p class="text-gray-900 dark:text-gray-400">
                                {{ $client->updated_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{route('client.edit', $client)}}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </a>
                        <form action="{{ route('client.delete', $client) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </button>
                        </form>
                        <a href="{{route('invoice.create.client', $client)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-green-600 border border-green-600 rounded-lg hover:bg-green-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300">
                            <i class="fa-solid fa-file-invoice mr-2"></i>Nowa Faktura
                        </a>
                    </div>
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
</x-app-layout>