<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Podgląd oferty') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <a href="{{ route('offer') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy ofert
                    </a>
                    <!--END POWRÓT-->

                    <!--PODGLĄD-->
                    <!--NAPIS-->
                    <div class="hidden md:flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Podgląd oferty
                        </h1>
                    </div>
                    <!--END NAPIS-->

                    <!--STYLE KARTKI PAPIERU-->
                    <style>
                        .a4-paper {
                            width: 794px;
                            /* Szerokość A4 w pikselach */
                            height: 1123px;
                            /* Wysokość A4 w pikselach */
                            background-color: white;
                            /* Białe tło, jak kartka papieru */
                            margin: 20px auto;
                            /* Środek strony z marginesem */
                            padding: 40px;
                            /* Wewnętrzny margines (odstęp od krawędzi) */
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                            /* Delikatny cień, aby wyglądało jak kartka */
                            border: 1px solid #e5e7eb;
                            /* Opcjonalna, delikatna ramka */
                            overflow: hidden;
                            /* Ukrycie nadmiaru treści */
                        }
                    </style>
                    <!--END STYLE KARTKI PAPIERU-->

                    <!--KARTKA PAIERU-->
                    <div class="bg-white a4-paper hidden md:block">
                        <iframe src="{{route('offer.show.file', $offer_obj)}}" width="100%" height="100%" style="border:none;"></iframe>
                    </div>
                    <!--END KARTKA PAIERU-->
                    <!--END PODGLĄD-->

                    <!--PRZYCISKI-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                        <!-- Edytuj -->
                        <a href="{{ route('offer.edit', $offer) }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-blue-500 border border-blue-500 rounded-lg hover:bg-blue-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </a>

                        <!-- Usuń -->
                        <form action="{{ route('offer.delete', $offer) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tą ofertę?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </button>
                        </form>
                    </div>
                    <div class="mt-8 hidden md:flex justify-start items-center space-x-4">
                        <!-- Nowa Faktura -->
                        <a href="{{route('invoice.store.from.ofr', $offer)}}" class="text-white bg-emerald-500 hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-file-invoice mr-2"></i>Nowa Faktura
                        </a>

                        <!-- Nowa PRO FORMA -->
                        <a href="" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-file-invoice mr-2"></i>Nowa Pro Forma
                        </a>

                        <!-- Pobierz PDF -->
                        <a href="{{route('offer.download', $offer_obj)}}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-file-pdf mr-2"></i>Pobierz PDF
                        </a>

                        <!-- Wyślij Fakturę do Klienta -->
                        <a href="{{route('offer.send',$offer_obj)}}" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-paper-plane mr-2"></i>Wyślij Ofertę
                        </a>
                    </div>
                    <!--END PRZYCISKI-->

                    <!--ALERT-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4 w-full">
                        @if(isset($offer_obj->client->email))
                        @if(isset($offer_obj->client->email2))
                        @if($offer_obj->client->email != null || $offer_obj->client->email2 != null)
                        @else
                        <div class="relative mt-2 bg-yellow-100 border border-yellow-300 text-yellow-900 rounded-lg p-4 w-full flex items-center justify-between" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-light-label">
                            <div class="flex items-center justify-start">
                                <span id="hs-soft-color-light-label" class="font-bold text-sm md:text-base">
                                    <i class="fa-solid fa-exclamation-triangle mr-2"></i>Uwaga klient nie ma adresu email
                                </span>
                                <p class="text-sm md:text-base text-gray-900 dark:text-gray-50 font-semibold text-start">
                                    <a href="{{ route('client.edit', $offer_obj->client) }}" class="text-yellow-900 dark:text-yellow-800 hover:underline">
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
                        @endif
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#close-alert').click(function() {
                                $(this).closest('div[role="alert"]').fadeOut();
                            });
                        });
                    </script>
                    <!--END ALERT-->

                    <!--BLUE WINDOW-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4 border-2 border-gray-700 rounded-lg p-4 pb-8">
                        <div class="col-span-2 md:grid md:grid-cols-1 md:gap-4 p-4 border-b dark:border-gray-700">
                            <h2 class="text-sm md:text-xl font-semibold text-gray-600 dark:text-gray-50">OFR</h2>
                        </div>

                        <div class="md:grid col-span-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">Numer</p>
                            <div class="flex flex-row justify-start items-center">
                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-sky-500 dark:text-white  mr-2">OFR</span>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{ $offer_obj->number }}</p>
                            </div>
                        </div>
                        <div class="md:grid col-span-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">Data wystawienia</p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{ $offer_obj->issue_date }}</p>
                        </div>
                        <div class="md:grid col-span-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">Termin ważności</p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{ $offer_obj->due_date }}</p>
                        </div>
                    </div>
                    <!--END BLUE WINDOW-->


                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <!--GREEN WINDOW-->
                        <div class="grid grid-cols-1 md:gap-4 border-2 border-gray-700 rounded-lg p-4 pb-8">
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    Sprzedawca
                                </p>
                            </div>
                            <div class="md:grid md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Nazwa sprzedającego</p>
                                @if($offer->client)
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <a href="{{route('setting')}}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                        {{ $offer_obj->seller_name }}
                                    </a>
                                </p>
                                @else
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $offer_obj->seller_name }}
                                </p>
                                @endif
                            </div>
                            <div class="md:grid md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Adres sprzedającego</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $offer_obj->seller_adress }}
                                </p>
                            </div>
                            <div class="col-start-1 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">NIP sprzedającego</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $offer_obj->seller_tax_id }}
                                </p>
                            </div>
                        </div>
                        <!--END GREEN WINDOW-->

                        <!--ORANGE WINDOW-->
                        <div class="grid grid-cols-1 md:gap-4 border-2 border-gray-700 rounded-lg p-4 pb-8">
                            <div class="md:grid md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    Nabywca
                                </p>
                            </div>
                            <div class="md:grid md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Nazwa kupującego</p>
                                @if($offer->client)
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <a href="{{route('client.show', $offer->client_id)}}" class="text-blue-600 dark:text-blue-400 hover:underline">{{ $offer_obj->buyer_name }}</a>
                                </p>
                                @else
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $offer_obj->buyer_name }}
                                </p>
                                @endif
                            </div>
                            <div class="md:grid md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Adres kupującego</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $offer_obj->buyer_adress }}
                                </p>
                            </div>
                            <div class="md:grid md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">NIP kupującego</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $offer_obj->buyer_tax_id }}
                                </p>
                            </div>
                            @if($offer_obj->buyer_person_name)
                            <div class="md:grid md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Imię i nazwisko kupującego</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $offer_obj->buyer_person_name }}
                                </p>
                            </div>
                            @endif
                            @if($offer_obj->buyer_person_email)
                            <div class="md:grid md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Adres email kupującego</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $offer_obj->buyer_person_email }}
                                </p>
                            </div>
                            @endif
                        </div>
                        <!--END ORANGE WINDOW-->
                    </div>

                    <!--GRAY WINDOW-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4 border-2 border-gray-700 rounded-lg p-4 pb-8">
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold ">
                                Pozycje
                            </p>
                        </div>
                        @foreach($offerItems as $item)
                        @if($item->product_id != null)
                        <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <a href="{{route('product.show', $item->product)}}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm md:text-xl font-semibold">{{$item->name}}</a>
                            <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT {{$item->vat_amount}}</h2>
                            <p class="text-gray-600 dark:text-gray-300 test-sm">{{ $offer_obj->subtotal }} PLN</p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end">{{ $offer_obj->total }} PLN</p>
                        </div>
                        @elseif($item->service_id != null)
                        <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <a href="{{route('service.show', $item->service)}}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm md:text-xl font-semibold">{{$item->name}}</a>
                            <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT {{$item->vat_amount}}</h2>
                            <p class="text-gray-600 dark:text-gray-300 test-sm">{{ $offer_obj->subtotal }} PLN</p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end">{{ $offer_obj->total }} PLN</p>
                        </div>
                        @else
                        <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{$item->name}}</h2>
                            <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT {{$item->vat_amount}}</h2>
                            <p class="text-gray-600 dark:text-gray-300 test-sm">{{ $offer_obj->subtotal }} PLN</p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end">{{ $offer_obj->total }} PLN</p>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <!--END GRAY WINDOW-->

                    <div class="grid grid-cols-2 md:gap-4">
                        <div>
                        </div>
                        <div class="mt-8 grid grid-cols-1 md:gap-4 border-2 border-gray-700 rounded-lg p-4 pb-8">
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end">
                                    Podsumowanie
                                </p>
                            </div>
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm  text-end">Kwota netto</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold  text-end">{{ $offer_obj->subtotal }} PLN</p>
                            </div>
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm  text-end">Kwota VAT</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold  text-end">{{ $offer_obj->vat }} PLN</p>
                            </div>
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm  text-end">Kwota brutto</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold  text-end">{{ $offer_obj->total }} PLN</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 grid grid-cols-2 md:gap-4 p-4 pb-8 border-2 border-gray-700 rounded-lg p-4 pb-8">
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">Uwagi</p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{ $offer_obj->notes }}</p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                {{ $offer_obj->user->name ?? '' }}
                            </p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Dane należące do
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                {{ $offer_obj->company->name ?? '' }}
                            </p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">Data utworzenia</p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 font-semibold">{{ $offer_obj->created_at->format('d-m-Y H:i') }}</p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">Data aktualizacji</p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 font-semibold">{{ $offer_obj->updated_at->format('d-m-Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="mt-8 flex md:hidden justify-end items-center space-x-4">
                        <!-- Pobierz PDF -->
                        <a href="{{route('offer.download', $offer_obj)}}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-file-pdf mr-2"></i>Pobierz PDF
                        </a>

                        <!-- Edytuj -->
                        <a href="{{ route('offer.edit', $offer) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </a>

                        <!-- Usuń -->
                        <form action="{{ route('offer.delete', $offer) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tą ofertę?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>