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
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Nazwa
                            </p>
                            <p class="text-lg text-gray-900 dark:text-gray-50 font-semibold">
                                {{ $client->name }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                NIP
                            </p>
                            <p class="text-lg text-gray-900 dark:text-gray-50 font-semibold">
                                {{ $client->vat_number }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Adres
                            </p>
                            <p class="text-lg text-gray-900 dark:text-gray-50 font-semibold">
                                {{ $client->adress }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Email
                            </p>
                            <p class="text-lg text-gray-900 dark:text-gray-50 font-semibold">
                                <a href="maito:{{ $client->email }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->email }}</a>
                                @if($client->email2)
                                <br>
                                <a href="maito:{{ $client->email2 }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->email2 }}</a>
                                @endif
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Telefon
                            </p>
                            <p class="text-lg text-gray-900 dark:text-gray-50 font-semibold">
                                <a href="tel:{{ $client->phone }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->phone }}</a>
                                @if($client->phone2)
                                <br>
                                <a href="tel:{{ $client->phone2 }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->phone2 }}</a>
                                @endif
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Uwagi
                            </p>
                            <p class="text-lg text-gray-900 dark:text-gray-50 font-semibold">
                                {{ $client->notes ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $client->user->name ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Dane należące do
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $client->company->name ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data utworzenia klienta
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $client->created_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data aktualizacji klienta
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-lg font-semibold">
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
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Podgląd faktur
                        </h1>
                    </div>
                    <!--Tabela-->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                        @if ($company)
                        <ul class="grid w-full gap-y-4 block md:hidden">
                            @if ($invoices->isEmpty())
                            <div class="text-center py-8">
                                <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                            </div>
                            @else
                            @foreach ($invoices as $invoice)
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-lg font-semibold dark:text-gray-50">{{ $invoice->number }}</span>
                                            <form action="{{route('invoice.delete', $invoice)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="text-sm text-gray-400 w-2/3">
                                            @if($invoice->client)
                                            <a href="{{ route('client.show', $invoice->client->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$invoice->client->name}}</a>
                                            @else
                                            {{$invoice->buyer_name}}
                                            @endif
                                        </div>
                                        <div class="flex flex-col items-end">
                                            <div>
                                                Netto <span class="font-semibold">{{ $invoice->subtotal }}</span> zł
                                            </div>
                                            <div>
                                                VAT <span class="font-semibold">{{ $invoice->vat }}</span> zł
                                            </div>
                                            <div class="text-lg dark:text-gray-50">
                                                Brutto <span class="font-semibold">{{ $invoice->total }}</span> zł
                                            </div>
                                        </div>
                                        <div class="flex space-x-4 mt-4">
                                            <a href="{{route('invoice.show', $invoice)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{route('invoice.edit', $invoice)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Numer faktury
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Klient
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kwota netto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kwota brutto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Podgląd
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Edycja
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Usuwanie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($invoices->isEmpty())
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="7" class="px-6 py-4">
                                        <div class="text-center py-8">
                                            <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                            <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                @foreach ($invoices as $invoice)
                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $invoice->number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($invoice->client)
                                        <a href="{{ route('client.show', $invoice->client->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$invoice->client->name}}</a>
                                        @else
                                        {{$invoice->buyer_name}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $invoice->subtotal }} zł
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $invoice->total }} zł
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('invoice.show', $invoice) }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('invoice.edit', $invoice) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('invoice.delete', $invoice) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę fakturę?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                        <!--LINKI-->
                        <div class="md:px-2 py-4">
                            {{ $invoices->links() }}
                        </div>
                        @else
                        @include('admin.elements.end_config')
                        @endif
                    </div>
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
</x-app-layout>