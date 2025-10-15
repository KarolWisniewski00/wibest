<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--WIDGET TASK-->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <x-button-link-back href="{{ route('invoice') }}" class="text-lg">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Faktur
                    </x-button-link-back>
                    <!--POWRÓT-->

                    <!--TYTUŁ-->
                    <div class="hidden md:flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Podgląd faktury
                        </h1>
                    </div>
                    <!--TYTUŁ-->

                    <!--A4-->
                    <x-a4 src="{{route('invoice.show.file', $invoice_obj)}}" />
                    <!--A4-->

                    <!--PRZYCISKI POD A4-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                        <!-- EDYTUJ -->
                        <x-button-link-blue href="{{ route('invoice.edit', $invoice) }}">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </x-button-link-blue>
                        <!--EDYTUJ-->

                        <!--USUŃ-->
                        <form action="{{ route('invoice.delete', $invoice) }}" method="POST"
                            onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                            @csrf
                            @method('DELETE')
                            <x-button-red type="submit">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </x-button-red>
                        </form>
                        <!--USUŃ-->
                    </div>
                    <div class="mt-8 flex justify-end items-center space-x-4">
                        <!-- Utwórz Fakturę Sprzedaży -->
                        @if($invoice_obj['invoice_type'] == 'faktura proforma')
                        @if($invoice_obj->invoice_id == null)
                        <x-button-link-green href="{{route('invoice.store.from', $invoice_obj)}}">
                            <i class="fa-solid fa-file-invoice-dollar mr-2"></i>Utwórz Fakturę Sprzedaży
                        </x-button-link-green>
                        @endif
                        @endif
                        <!-- Utwórz Fakturę Sprzedaży -->

                        <!-- Wyślij Fakturę do Klienta -->
                        @if($invoice_obj->client)
                        @if($invoice_obj->client->email != null || $invoice_obj->client->email2 != null)
                        <x-button-link-orange href="{{route('invoice.send', $invoice_obj)}}">
                            <i class="fa-solid fa-paper-plane mr-2"></i>Wyślij Fakturę
                        </x-button-link-orange>
                        @else
                        <x-button-link-disabled type="button" disabled>
                            <i class="fa-solid fa-paper-plane mr-2"></i>Brak adresu e-mail
                        </x-button-link-disabled>
                        @endif
                        @endif
                        <!-- Wyślij Fakturę do Klienta -->

                        <!-- Pobierz PDF -->
                        <x-button-link-blue href="{{route('invoice.download', $invoice_obj)}}">
                            <i class="fa-solid fa-file-pdf mr-2"></i>Pobierz PDF
                        </x-button-link-blue>
                        <!-- Pobierz PDF -->
                    </div>
                    <!--PRZYCISKI POD A4-->

                    <!--ALERT-->
                    <div class="my-8 hidden md:flex justify-end items-center space-x-4 w-full">
                        @if($invoice_obj->client)
                        @if($invoice_obj->client->email != null || $invoice_obj->client->email2 != null)
                        @else
                        <div class="relative mt-2 bg-yellow-100 border border-yellow-300 text-yellow-900 rounded-lg p-4 w-full flex items-center justify-between" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-light-label">
                            <div class="flex items-center justify-start">
                                <span id="hs-soft-color-light-label" class="font-bold text-sm md:text-base">
                                    <i class="fa-solid fa-exclamation-triangle mr-2"></i>Uwaga klient nie ma adresu email
                                </span>
                                <p class="text-sm md:text-base text-gray-900 dark:text-gray-50 font-semibold text-start">
                                    <a href="{{ route('client.edit', $invoice_obj->client) }}" class="text-yellow-900 dark:text-yellow-800 hover:underline">
                                        <span>, kliknij aby dodać adres email</span>
                                    </a>
                                </p>
                            </div>
                            <button id="close-alert" class="ml-4 text-yellow-900 hover:text-yellow-700 focus:outline-none">
                                <i class="fa-solid fa-times"></i>
                            </button>
                        </div>
                        @endif
                        @endif
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#close-alert').click(function() {
                                $(this).closest('div[role="alert"]').fadeOut();
                            });
                        });
                    </script>
                    <!--ALERT-->

                    <!--POWRÓT-->
                    <x-button-link-back href="{{ route('invoice') }}" class="text-lg">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Faktur
                    </x-button-link-back>
                    <!--POWRÓT-->

                    <!--GŁOWA-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <x-container-gray>
                            <!--NUMER-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Numer
                                </p>
                                <x-invoice-label :invoice="$invoice_obj" />
                            </x-text-cell>
                            <!--NUMER-->

                            <!--TYP-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Typ
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->invoice_type }}
                                </p>
                            </x-text-cell>
                            <!--TYP-->

                            <!--DATY-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Data wystawienia
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->issue_date }}
                                </p>
                            </x-text-cell>
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Data sprzedaży
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->sale_date }}
                                </p>
                            </x-text-cell>
                            <!--DATY-->

                            <!--PŁATNOŚCI-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Termin płatności
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->due_date }}
                                </p>
                            </x-text-cell>
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Metoda płatności
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->payment_method }}
                                </p>
                            </x-text-cell>
                            <!--PŁATNOŚCI-->
                        </x-container-gray>
                    </div>
                    <!--NUMER PŁATNOŚCI DATY i TYP-->

                    <!--BODY-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <!--SPRZEDAJĄCY-->
                        <x-container-gray>
                            <!--NAZWA-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa sprzedającego
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <x-label-link-company href="{{route('setting')}}">
                                        {{ $invoice_obj->seller_name }}
                                    </x-label-link-company>
                                </p>
                            </x-text-cell>
                            <!--NAZWA-->

                            <!--ADRES-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Adres sprzedającego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->seller_adress }}
                                </p>
                            </x-text-cell>
                            <!--ADRES-->

                            <!--NIP-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    NIP sprzedającego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->seller_tax_id }}
                                </p>
                            </x-text-cell>
                            <!--NIP-->

                            <!--BANK-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Numer konta sprzedającego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->seller_bank }}
                                </p>
                            </x-text-cell>
                            <!--BANK-->
                        </x-container-gray>
                        <!--SPRZEDAJĄCY-->

                        <!--KUPUJĄCY-->
                        <x-container-gray>
                            <!--NAZWA-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa kupującego
                                </p>
                                @if($invoice->client)
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <x-label-link-company href="{{route('client.show', $invoice->client_id)}}">
                                        {{ $invoice_obj->buyer_name }}
                                    </x-label-link-company>
                                </p>
                                @else
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->buyer_name }}
                                </p>
                                @endif
                            </x-text-cell>
                            <!--NAZWA-->

                            <!--ADRES-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Adres kupującego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->buyer_adress }}
                                </p>
                            </x-text-cell>
                            <!--ADRES-->

                            <!--NIP-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    NIP kupującego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->buyer_tax_id }}
                                </p>
                            </x-text-cell>
                            <!--NIP-->
                        </x-container-gray>
                        <!--KUPUJĄCY-->

                        <!--POZYCJE-->
                        @foreach($invoiceItems as $item)
                        @if($item->product_id != null)
                        <x-container-gray class="col-span-2">
                            <x-text-cell>
                                <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                    <a href="{{route('product.show', $item->product)}}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm md:text-xl font-semibold">{{$item->name}}</a>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT {{$item->vat_amount}}</h2>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm">{{ $invoice_obj->subtotal }} PLN</p>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end">{{ $invoice_obj->total }} PLN</p>
                                </div>
                            </x-text-cell>
                        </x-container-gray>
                        @elseif($item->service_id != null)
                        <x-container-gray class="col-span-2">
                            <x-text-cell>
                                <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                    <a href="{{route('service.show', $item->service)}}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm md:text-xl font-semibold">{{$item->name}}</a>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT {{$item->vat_amount}}</h2>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm">{{ $invoice_obj->subtotal }} PLN</p>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end">{{ $invoice_obj->total }} PLN</p>
                                </div>
                            </x-text-cell>
                        </x-container-gray>
                        @else
                        <x-container-gray class="col-span-2">
                            <x-text-cell>
                                <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{$item->name}}</h2>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT {{$item->vat_amount}}</h2>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm">{{ $invoice_obj->subtotal }} PLN</p>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end">{{ $invoice_obj->total }} PLN</p>
                                </div>
                            </x-text-cell>
                        </x-container-gray>
                        @endif
                        @endforeach
                        <!--POZYCJE-->

                        <!--PODSUMOWANIE-->
                        <div class="md:col-span-1 md:col-start-2">
                            <x-invoice-summary />
                        </div>
                        <!--PODSUMOWANIE-->

                        <!--STATUS I UWAGI-->
                        <x-container-gray class="col-span-2">
                            <x-text-cell>
                                <x-invoice-status :invoice="$invoice_obj" />
                                <x-invoice-progress :invoice="$invoice_obj" />
                            </x-text-cell>
                            <x-text-cell>
                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                    Uwagi
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $invoice_obj->notes }}
                                </p>
                            </x-text-cell>
                        </x-container-gray>
                        <!--STATUS I UWAGI-->
                    </div>
                    <!--BODY-->

                    <!--PRZYCISKI POD A4-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                        <!-- EDYTUJ -->
                        <x-button-link-blue href="{{ route('invoice.edit', $invoice) }}">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </x-button-link-blue>
                        <!--EDYTUJ-->

                        <!--USUŃ-->
                        <form action="{{ route('invoice.delete', $invoice) }}" method="POST"
                            onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                            @csrf
                            @method('DELETE')
                            <x-button-red type="submit">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </x-button-red>
                        </form>
                        <!--USUŃ-->
                    </div>
                    <div class="mt-8 flex justify-end items-center space-x-4">
                        <!-- Utwórz Fakturę Sprzedaży -->
                        @if($invoice_obj['invoice_type'] == 'faktura proforma')
                        @if($invoice_obj->invoice_id == null)
                        <x-button-link-green href="{{route('invoice.store.from', $invoice_obj)}}">
                            <i class="fa-solid fa-file-invoice-dollar mr-2"></i>Utwórz Fakturę Sprzedaży
                        </x-button-link-green>
                        @endif
                        @endif
                        <!-- Utwórz Fakturę Sprzedaży -->

                        <!-- Wyślij Fakturę do Klienta -->
                        @if($invoice_obj->client)
                        @if($invoice_obj->client->email != null || $invoice_obj->client->email2 != null)
                        <x-button-link-orange href="{{route('invoice.send', $invoice_obj)}}">
                            <i class="fa-solid fa-paper-plane mr-2"></i>Wyślij Fakturę
                        </x-button-link-orange>
                        @else
                        <x-button-link-disabled type="button" disabled>
                            <i class="fa-solid fa-paper-plane mr-2"></i>Brak adresu e-mail
                        </x-button-link-disabled>
                        @endif
                        @endif
                        <!-- Wyślij Fakturę do Klienta -->

                        <!-- Pobierz PDF -->
                        <x-button-link-blue href="{{route('invoice.download', $invoice_obj)}}">
                            <i class="fa-solid fa-file-pdf mr-2"></i>Pobierz PDF
                        </x-button-link-blue>
                        <!-- Pobierz PDF -->
                    </div>
                    <!--PRZYCISKI POD A4-->

                    <!--ALERT-->
                    <div class="my-8 hidden md:flex justify-end items-center space-x-4 w-full">
                        @if($invoice_obj->client)
                        @if($invoice_obj->client->email != null || $invoice_obj->client->email2 != null)
                        @else
                        <div class="relative mt-2 bg-yellow-100 border border-yellow-300 text-yellow-900 rounded-lg p-4 w-full flex items-center justify-between" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-light-label">
                            <div class="flex items-center justify-start">
                                <span id="hs-soft-color-light-label" class="font-bold text-sm md:text-base">
                                    <i class="fa-solid fa-exclamation-triangle mr-2"></i>Uwaga klient nie ma adresu email
                                </span>
                                <p class="text-sm md:text-base text-gray-900 dark:text-gray-50 font-semibold text-start">
                                    <a href="{{ route('client.edit', $invoice_obj->client) }}" class="text-yellow-900 dark:text-yellow-800 hover:underline">
                                        <span>, kliknij aby dodać adres email</span>
                                    </a>
                                </p>
                            </div>
                            <button id="close-alert" class="ml-4 text-yellow-900 hover:text-yellow-700 focus:outline-none">
                                <i class="fa-solid fa-times"></i>
                            </button>
                        </div>
                        @endif
                        @endif
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#close-alert').click(function() {
                                $(this).closest('div[role="alert"]').fadeOut();
                            });
                        });
                    </script>
                    <!--ALERT-->
                    <!--INFO-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                {{ $invoice_obj->user->name ?? '' }}
                            </p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Dane należące do
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                {{ $invoice_obj->company->name ?? '' }}
                            </p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data utworzenia
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 font-semibold">
                                {{ $invoice_obj->created_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data aktualizacji
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 font-semibold">
                                {{ $invoice_obj->updated_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                    </div>
                    <!--INFO-->
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
</x-app-layout>