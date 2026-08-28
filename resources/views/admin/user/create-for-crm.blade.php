<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--MAIN-->
        <x-main-no-filter>
            <x-setting.nav />

            <!--CONTENT-->
            <x-container-content-form>
                <!--POWRÓT-->
                <x-button-link-back href="{{ route('setting.client.show', $client) }}" class="text-lg mb-4">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                </x-button-link-back>
                <!--POWRÓT-->
                <h2 class="text-xl font-semibold dark:text-white mb-4">🚀 Dodaj Użytkownika dla CRM</h2>

                <div>
                    <form method="POST" action="{{route('setting.user.store.for.crm', $client)}}">
                        @csrf
                        <div class="mt-2">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                <span>👤</span> Imię i nazwisko <span class="text-xs text-gray-400">(opcjonalne)</span>
                            </label>
                            <input type="text" name="name" wire:model="state.name"
                                class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                        </div>
                        <div class="mt-2">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                <span>✉️</span> Email <span class="text-xs text-gray-400">(opcjonalne)</span>
                            </label>
                            <input type="text" name="email" wire:model="state.email"
                                class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                        </div>
                        <div class="mt-2">
                            <label for="phone"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                <span>📞</span> Telefon <span class="text-xs text-gray-400">(opcjonalne)</span>
                            </label>
                            <input type="text" name="phone" wire:model="state.phone"
                                class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                        </div>
                        <div class="mt-2">
                            <label for="position"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                <span>💼</span> Stanowisko <span class="text-xs text-gray-400">(opcjonalne)</span>
                            </label>
                            <input type="text" name="position" wire:model="state.position"
                                class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                        </div>
                        <!--ZAPISZ-->
                        <div class="flex justify-end mt-4">
                            <x-button-green type="submit" class="text-lg">
                                <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                            </x-button-green>
                        </div>
                        <!--ZAPISZ-->
                    </form>
                </div>

            </x-container-content-form>
            <!--CONTENT-->
        </x-main-no-filter>
        <!--MAIN-->
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>