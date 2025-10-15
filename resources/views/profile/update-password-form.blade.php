<x-form-section submit="updatePassword">
    <x-slot name="title">
        Zmień hasło
    </x-slot>

    <x-slot name="description">
        Upewnij się, że Twoje konto używa długiego, losowego hasła, aby zachować bezpieczeństwo.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" >
                Obecne hasło
            </x-label>
            <x-input id="current_password" type="password" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password">
                Nowe hasło
            </x-label>
            <x-input id="password" type="password" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation">
                Potwierdź hasło
            </x-label>
            <x-input id="password_confirmation" type="password" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            Zapisano.
        </x-action-message>

        <x-button-green>
            Zapisz
        </x-button-green>
    </x-slot>
</x-form-section>