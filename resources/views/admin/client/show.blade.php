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
                            <x-text-cell-span style="word-break: break-all;">
                                <span class="text-2xl">🏢</span>
                                {{ $client->name }}
                            </x-text-cell-span>
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
                    <!--Ilość wysłanych wiadomości-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Ilość wysłanych wiadomości
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">📩</span>
                                {{ $msg->count() }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Ilość wysłanych wiadomości-->
                    <!--Zużycie SMS-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Zużycie SMS
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">📱</span>
                                {{ $msg->sum('price') ?? 0 }} PLN
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Zużycie SMS-->
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
                <x-container-scroll class="md:col-span-2">
                    <!--MOBILE VIEW-->
                    <x-list :items="$users" emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach ($users as $user)
                        <x-card-user :user="$user" />
                        @endforeach
                    </x-list>
                    <!--MOBILE VIEW-->

                    <!--PC VIEW-->
                    <x-table
                        :headers="['Firma', 'Nazwa', 'Data dołączenia', 'Opłacone do', 'Podgląd']"
                        :items="$users"
                        :checkBox="false"
                        emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach($users as $user)
                        <x-row-user :user="$user" />
                        @endforeach
                    </x-table>
                    </table>
                    <!--PC VIEW-->
                </x-container-scroll>
                <x-container-header class="px-0 grid gap-2 md:flex md:gap-0 md:justify-between md:col-span-2">
                    <x-h1-display>
                        <span>📩</span> 10 twoich ostatnich wysłanych wiadomości
                    </x-h1-display>
                </x-container-header>
                <x-container-scroll class="md:col-span-2">
                    <!-- MOBILE VIEW -->
                    <x-list :items="$msg_paginate" emptyMessage="Brak wiadomości do wyświetlenia.">
                        @foreach ($msg_paginate as $m)
                        <x-card-msg-setting :msg="$m" />
                        @endforeach
                    </x-list>

                    <!-- PC VIEW -->
                    <x-table
                        :headers="['Nazwa', 'Typ', 'Odbiorca', 'Tytuł', 'Treść', 'Status', 'Cena', 'Kiedy wysłano']"
                        :items="$msg_paginate"
                        :checkBox="false"
                        emptyMessage="Brak wiadomości do wyświetlenia.">
                        @foreach($msg_paginate as $m)
                        <x-row-msg-setting :msg="$m" />
                        @endforeach
                    </x-table>
                </x-container-scroll>
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