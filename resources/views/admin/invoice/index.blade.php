<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Faktury') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <style>
                        .sticky {
                            position: fixed;
                            top: 0;
                            width: 100%;
                            z-index: 1000;
                            padding-right: 48px;
                        }

                        /* Dodajemy styl na kontener z miesiącami, aby umożliwić przewijanie */
                        #months-container {
                            display: flex;
                            flex-direction: row;
                            overflow-x: auto;
                            /* Przewijanie poziome */
                            padding-bottom: 10px;
                            gap: 8px;
                            /* Odstępy między elementami */
                            scrollbar-width: thin;
                            /* Cieńszy pasek przewijania w przeglądarkach wspierających */
                        }

                        /* Stylizowanie paska przewijania dla WebKit (Chrome, Safari) */
                        #months-container::-webkit-scrollbar {
                            height: 8px;
                        }

                        #months-container::-webkit-scrollbar-thumb {
                            background-color: #888;
                            border-radius: 4px;
                        }

                        #months-container::-webkit-scrollbar-thumb:hover {
                            background-color: #555;
                        }
                    </style>

                    <!-- Napis z przyciskiem tworzenia -->
                    <div id="fixed" class="pb-4 flex flex-col justify-between items-center bg-white dark:bg-gray-800">
                        <div class="flex flex-row justify-between items-center w-full">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                                Faktury
                            </h1>
                            @if ($company)
                            <a href="{{ route('invoice.create') }}" class="mt-8 mb-4 inline-flex items-center justify-center w-10 h-10 mr-2 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                            @else
                            @endif
                        </div>

                        <div id="months-container" class="w-full py-4">
                            @if(isset($month))
                            <a href="{{route('invoice')}}" class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium border border-indigo-500 text-indigo-500 dark:text-indigo-400 whitespace-nowrap">
                                {{$month}}
                            </a>
                            @endif
                            <!-- Tutaj będą dodane miesiące -->
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            var element = $('#fixed');
                            var elementOffset = element.offset().top;

                            $(window).scroll(function() {
                                if ($(window).scrollTop() > elementOffset) {
                                    element.addClass('sticky');
                                } else {
                                    element.removeClass('sticky');
                                }
                            });

                            // Funkcja do generowania nazw miesięcy po polsku
                            function generateMonths() {
                                const months = [
                                    "Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec",
                                    "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"
                                ];
                                const today = new Date();
                                const currentMonth = today.getMonth();
                                const monthContainer = $('#months-container');

                                // Dodaj 12 miesięcy zaczynając od aktualnego miesiąca
                                for (let i = 0; i < 12; i++) {
                                    const monthIndex = (currentMonth - i + 12) % 12; // Obliczanie indeksu miesiąca
                                    const monthName = months[monthIndex];
                                    // Tworzenie i dodawanie elementu Badge
                                    const monthBadge = `
                                    <a href="{{route('invoice.filter.month', '')}}/${monthName}" class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium border border-gray-500 text-gray-500 dark:text-neutral-400 whitespace-nowrap">
                                    ${monthName}
                                    </a>
                                    `;
                                    monthContainer.append(monthBadge);
                                }
                            }

                            // Wywołaj funkcję generującą miesiące
                            generateMonths();
                        });
                    </script>


                    <!--Tabela-->
                    <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8">
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
        </div>
    </div>
</x-app-layout>