<x-app-layout class="flex">
    <style>
        [data-team-record] { position: relative; isolation: isolate; }
        #table { border-collapse: separate; border-spacing: 0 12px; }
        #table thead th:first-child { border-radius: .75rem 0 0 .75rem; }
        #table thead th:last-child { border-radius: 0 .75rem .75rem 0; }
        #table thead th { padding-top: 1rem; padding-bottom: 1rem; }
        #table tr[data-team-record] > td { background-color: #fff; transition: background-color 150ms ease; }
        #table tr[data-team-record]:hover > td { background-color: #f3f4f6; }
        #table tr[data-team-record] > td:first-child { border-radius: .75rem 0 0 .75rem; }
        #table tr[data-team-record] > td:last-child { border-radius: 0 .75rem .75rem 0; }
        @media (prefers-color-scheme: dark) {
            #table tr[data-team-record] > td { background-color: #1f2937; }
            #table tr[data-team-record]:hover > td { background-color: #374151; }
        }
        [data-team-link]::after { content: ''; position: absolute; inset: 0; z-index: 1; border-radius: inherit; }
        [data-team-link]:focus-visible::after { outline: 2px solid #9ca3af; outline-offset: -2px; }
        [data-team-record] a:not([data-team-link]), [data-team-record] button,
        [data-team-record] input, [data-team-record] select { position: relative; z-index: 2; }
    </style>
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter aria-label="Szukaj użytkownika po nazwie" />
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
                :headers="['Pracownik', 'Dane kontaktowe', 'Obecność', '']"
                :items="$users"
                :checkBox="false"
                emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach($users as $user)
                <x-row-team :user="$user" />
                @endforeach
                <x-loader-team id="loader" />
            </x-table>
            <!--PC VIEW-->

        </x-container-content>
        <!--CONTENT-->
        <p id="team-feedback" role="status" aria-live="polite" class="px-4 mb-8 pb-4 text-sm text-gray-600 dark:text-gray-300"></p>
        <x-download-only-counting />
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>
