<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-team />
        <x-filter-team-script>
            {{ route('api.v1.team.user.set.role') }}
        </x-filter-team-script>
    </x-sidebar-left>
    <!--SIDE BAR-->
    <!--MAIN-->
    <x-main>
        <x-team.nav :role="$role" :invitations="$invitations" />
        <x-team.header>
            <span>👤</span> Mój zespół
        </x-team.header>
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            WSZYSTKO
        </x-status-cello>
        <!--CONTENT-->
        <x-container-content>
            <!--MOBILE VIEW-->
            <x-list :items="$users" emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach ($users as $user)
                <x-card-team :user="$user" />
                @endforeach
                <x-loader-team-card id="loader-card" />
            </x-list>
            <!--MOBILE VIEW-->

            <!--PC VIEW-->
            <x-table
                :headers="['Nazwa', 'Informacje', 'Podgląd']"
                :items="$users"
                :checkBox="false"
                emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach($users as $user)
                <x-row-team :user="$user" />
                @endforeach
                <x-loader-team id="loader" />
            </x-table>
            <x-loader />
            <!--PC VIEW-->
            <x-loader-script>
                {{ route('api.v1.team.user.get') }}
            </x-loader-script>
        </x-container-content>
        <!--CONTENT-->
        <x-download-only-counting />
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>