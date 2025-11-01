<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)

    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />
        <x-setting.header-user>
            <span>👤</span> Użytkownicy
        </x-setting.header-user>

        <!--CONTENT-->
        <x-container-content>
            <!--MOBILE VIEW-->
            <x-list :items="$users" emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach ($users as $user)
                <x-card-user :user="$user" />
                @endforeach
            </x-list>
            <!--MOBILE VIEW-->

            <!--PC VIEW-->
            <x-table
                :headers="['Firma', 'Nazwa', 'Informacje', 'Podgląd']"
                :items="$users"
                emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach($users as $user)
                <x-row-user :user="$user" />
                @endforeach
            </x-table>
            <x-loader />
            </table>
            <!--PC VIEW-->
            <x-loader-script>
                {{ route('api.v1.setting.user.get') }}
            </x-loader-script>
        </x-container-content>
        <!--CONTENT-->
        <x-download-only-counting/>
    </x-main-no-filter>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>