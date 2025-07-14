<x-action-section>
    <x-slot name="title">
        Usuń konto
    </x-slot>

    <x-slot name="description">
        Trwale usuń swoje konto.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            Po usunięciu konta wszystkie jego zasoby i dane zostaną trwale usunięte. Przed usunięciem konta pobierz wszystkie dane lub informacje, które chcesz zachować.
        </div>

        <div class="mt-5">
            <x-button-red wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                Usuń konto
            </x-button-red>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                Usuń konto
            </x-slot>

            <x-slot name="content">
                Czy na pewno chcesz usunąć swoje konto? Po usunięciu konta wszystkie jego zasoby i dane zostaną trwale usunięte. Wprowadź swoje hasło, aby potwierdzić trwałe usunięcie konta.

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="Hasło"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-button-red wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    Anuluj
                </x-button-red>

                <x-button-red class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    Usuń konto
                </x-button-red>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
