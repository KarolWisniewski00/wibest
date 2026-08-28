<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)

        <!--MAIN-->
        <x-main-no-filter>
            <x-setting.nav />
            <x-setting.header-blog>
                <span>📈</span> Blog
            </x-setting.header-blog>

            <!--CONTENT-->
            <x-container-content>
                <!--PC VIEW-->
                <x-table showMobile="true"
                    :headers="['Użytkownik', 'Tytuł', 'Typ', 'Zawartość', 'Edycja']"
                    :items="$blogs"
                    :checkBox="false" emptyMessage="Brak danych do wyświetlenia.">
                    @foreach($blogs as $blog)
                        <x-row-blog :blog="$blog" />
                    @endforeach
                    <x-loader-blog id="loader" />
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