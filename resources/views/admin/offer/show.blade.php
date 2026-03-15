<x-app-layout>
    @include('admin.elements.alerts')

    <x-main-no-filter>
        <div class="p-4">
            <!--POWRÓT-->
            <x-button-link-back href="" class="text-lg">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Ofert
            </x-button-link-back>
            <!--POWRÓT-->
            <div class="grid grid-cols-1 mt-8 gap-4">
                <x-container-gray>
                    <!--NUMER-->
                    <x-text-cell>
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Numer
                        </p>
                        <x-offer-label :offer="$offer_obj" />
                    </x-text-cell>
                    <!--NUMER-->

                    <!--DATY-->
                    <x-text-cell>
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Data wystawienia
                        </p>
                        <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                            {{ $offer_obj->issue_date }}
                        </p>
                    </x-text-cell>
                    <!--DATY-->

                    <!--PŁATNOŚCI-->
                    <x-text-cell>
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Termin ważności
                        </p>
                        <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                            {{ $offer_obj->due_date }}
                        </p>
                    </x-text-cell>
                    <!--PŁATNOŚCI-->
                </x-container-gray>
            </div>

            <!--PRZYCISKI POD A4-->
            <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                <!-- EDYTUJ -->
                <x-button-link-blue href="{{ route('setting.offer.edit', $offer_obj) }}">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                </x-button-link-blue>
                <!--EDYTUJ-->

                <!--USUŃ-->
                <form action="" method="POST"
                    onsubmit="return confirm('Czy na pewno chcesz usunąć tą ofertę?');">
                    @csrf
                    @method('DELETE')
                    <x-button-red type="submit">
                        <i class="fa-solid fa-trash mr-2"></i>Usuń
                    </x-button-red>
                </form>
                <!--USUŃ-->
            </div>
            <div class="mt-8 flex justify-end items-center space-x-4">
                <!-- Pobierz PDF -->
                <x-button-link-blue href="{{route('offer.download', $offer_obj)}}">
                    <i class="fa-solid fa-file-pdf mr-2"></i>Pobierz PDF
                </x-button-link-blue>
                <!-- Pobierz PDF -->
            </div>
            <!--PRZYCISKI POD A4-->
            <!--A4-->
            <x-a4 src="{{route('offer.show.file', $offer)}}" />
            <!--A4-->

            <x-label class="py-2">
                Utworzono {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $offer_obj->created_at)->format('d.m.Y H:i:s') ?? '' }}
            </x-label>
            <x-label class="py-2">
                Utoworzono przez {{ $offer_obj->user->name ?? '' }}
            </x-label>
            <x-label class="py-2">
                Ostatnia aktualizacja {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $offer_obj->updated_at)->format('d.m.Y H:i:s') ?? '' }}
            </x-label>

        </div>
    </x-main-no-filter>
</x-app-layout>