<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)

    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />
        <x-setting.header-client>
            <span>🏢</span> Klienci
        </x-setting.header-client>

        <!--CONTENT-->
        <x-container-content>
            <!--MOBILE VIEW-->
            <x-list :items="$companies" emptyMessage="Brak klientów do wyświetlenia.">
                @foreach ($companies as $client)
                <x-card-client :client="$client" />
                @endforeach
                <x-loader-client-card id="loader-card" />
            </x-list>
            <!--MOBILE VIEW-->

            <!--PC VIEW-->
            <x-table
                :headers="['Nazwa', 'Adres', 'NIP', 'Użytkownicy', 'Podgląd']"
                :items="$companies"
                :checkBox="false"
                emptyMessage="Brak klientów do wyświetlenia.">
                @foreach($companies as $client)
                <x-row-client :client="$client" />
                @endforeach
                <x-loader-client id="loader" />
            </x-table>
            <!--PC VIEW-->
            <x-loader-script>
                {{ route('api.v1.setting.client.get') }}
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