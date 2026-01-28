<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)

    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />
        <x-setting.header-offer>
            <span>🏷️</span> Oferty
        </x-setting.header-offer>

        <!--CONTENT-->
        <x-container-content>


            <!--PC VIEW-->
            <x-table
                :headers="['Numer', 'Klient', 'Netto', 'Brutto', 'Status', 'Podgląd']"
                :items="$offers"
                :checkBox="false"
                emptyMessage="Brak ofert do wyświetlenia.">
                @foreach($offers as $offer)
                <x-row-offer :offer="$offer" />
                @endforeach
            </x-table>
            <!--PC VIEW-->
            <x-loader-script>
            </x-loader-script>
        </x-container-content>
        <!--CONTENT-->
        <x-download-only-counting />
    </x-main-no-filter>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>