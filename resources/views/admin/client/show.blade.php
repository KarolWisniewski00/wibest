<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />

        <!--CONTENT-->
        <x-container-content-form>
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.client') }}" class="text-lg">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                <x-container-gray>
                    <!--Nazwa-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Nazwa
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-label-link-company
                                href="{{route('setting.client.show', $client)}}"
                                class="flex justify-center items-center font-semibold text-2xl uppercase tracking-widest">
                                {{ $client->name }}
                            </x-label-link-company>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Nazwa-->

                    <!--Adres-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Adres
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">📍</span>
                                {{ $client->adress }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Adres-->

                    <!--NIP-->
                    <x-text-cell>
                        <x-text-cell-label>
                            NIP
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">🧾</span>
                                {{ $client->vat_number }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--NIP-->
                </x-container-gray>
                <x-container-gray>
                    <!--Ilość użytkowników-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Ilość użytkowników
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">👤</span>
                                {{ $users->count() }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Ilość użytkowników-->
                </x-container-gray>
                <x-container-header class="px-0 grid gap-2 md:flex md:gap-0 md:justify-between md:col-span-2">
                    <x-h1-display>
                        <span>👤</span> Użytkownicy
                    </x-h1-display>
                    <x-flex-center class="gap-2">
                        <x-button-link-green href="{{route('setting.user.create', $client)}}" class="text-xs">
                            <i class="fa-solid fa-plus mr-2"></i>Dodaj Użytkownika
                        </x-button-link-green>
                    </x-flex-center>
                </x-container-header>
                <div class="max-h-64 overflow-y-auto md:col-span-2 rounded-lg border-2 border-gray-50 dark:border-gray-700 snap-y snap-mandatory p-4 md:p-0">
                    <!--MOBILE VIEW-->
                    <x-list :items="$users" emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach ($users as $user)
                        <x-card-user :user="$user" />
                        @endforeach
                    </x-list>
                    <!--MOBILE VIEW-->

                    <!--PC VIEW-->
                    <x-table
                        :headers="['Firma', 'Nazwa','Informacje', 'Podgląd']"
                        :items="$users"
                        emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach($users as $user)
                        <x-row-user :user="$user" />
                        @endforeach
                    </x-table>
                    </table>
                    <!--PC VIEW-->
                </div>
            </div>

            <!--PRZYCISKI-->
            <div class="flex justify-end gap-4 mt-4">
                <!-- EDYTUJ -->
                <x-button-link-blue href="{{route('setting.client.edit', $client)}}">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                </x-button-link-blue>
                <!--EDYTUJ-->

                <!--USUŃ-->
                <form action="{{ route('setting.client.delete', $client) }}" method="POST"
                    onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                    @csrf
                    @method('DELETE')
                    <x-button-red type="submit">
                        <i class="fa-solid fa-trash mr-2"></i>Usuń
                    </x-button-red>
                </form>
                <!--USUŃ-->
            </div>
            <!--PRZYCISKI-->

            <x-label class="py-2 mt-4">
                Utworzono {{ $client->created_at }}
            </x-label>
            <x-label class="py-2">
                Utoworzono przez {{ $client->created_user->name }}
            </x-label>
            <x-label class="py-2">
                Ostatnia aktualizacja {{ $client->updated_at }}
            </x-label>

        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
</x-app-layout>