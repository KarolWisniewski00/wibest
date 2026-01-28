<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />
        <x-setting.header>
            <span>🏢</span> Moja firma
        </x-setting.header>
        <!--CONTENT-->
        <x-container-content-form class="pt-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
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
                            <x-text-cell-span style="word-break: break-all;">
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
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100">
                    <span>👤</span> Użytkownicy
                </h1>
                <x-container-scroll class="md:col-span-2">
                    <!-- MOBILE VIEW -->
                    <x-list :items="$users" emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach ($users as $user)
                        <x-card-user-setting :user="$user" />
                        @endforeach
                    </x-list>

                    <!-- PC VIEW -->
                    <x-table
                        :headers="['Nazwa', 'Data dołączenia', 'Opłacone do', 'Podgląd']"
                        :items="$users"
                        :checkBox="false"
                        emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach($users as $user)
                        <x-row-user-setting :user="$user" />
                        @endforeach
                    </x-table>
                </x-container-scroll>
                @endif
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100">
                    <span>📩</span> 10 ostatnich wysłanych wiadomości
                </h1>
                @else
                <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100">
                    <span>📩</span> 10 twoich ostatnich wysłanych wiadomości
                </h1>
                @endif
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
                @if ($company)
                @if($role == 'admin' || $role == 'właściciel')
                <!-- EDYTUJ -->
                <x-button-link-blue href="{{route('setting.edit', $company)}}">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                </x-button-link-blue>
                <!--EDYTUJ-->
                @endif
                @endif
            </div>
            <!--PRZYCISKI-->

            <x-label class="py-2 mt-4">
                Utworzono {{ $client->created_at }}
            </x-label>
            <x-label class="py-2">
                Ostatnia aktualizacja {{ $client->updated_at }}
            </x-label>

        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>