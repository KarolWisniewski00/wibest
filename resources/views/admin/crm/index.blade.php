<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)

        <!--MAIN-->
        <x-main-no-filter>
            <x-setting.nav />
            <x-setting.header-crm>
                <span>🚀</span> CRM
            </x-setting.header-crm>

            <!--CONTENT-->
            <x-container-content>
                <!--PC VIEW-->
                <x-table showMobile="true" :headers="['Firma', 'Użytkownik', 'typ', 'Notatka', 'Edycja']" :items="$crms" :checkBox="false"
                    emptyMessage="Brak danych do wyświetlenia.">
                    @foreach($crms as $crm)
                        <x-row-crm :crm="$crm" />
                    @endforeach
                    <x-loader-crm id="loader" />
                </x-table>
                <!--PC VIEW-->
                <x-loader-script>
                    {{ route('api.v1.setting.crm.get') }}
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