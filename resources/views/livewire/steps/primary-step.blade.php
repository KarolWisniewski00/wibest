<div>

    <div class="space-y-6 px-6 py-4">
        <div class="mb-6" id="manager">
            <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white flex items-center gap-2">
                <span>📋</span> Podstawowe dane
            </h3>
            <div>
                <div class="mt-1">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>👤</span> Imię i nazwisko
                    </label>
                    <input type="text" name="name" wire:model="state.name" class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                </div>
                <div class="mt-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>✉️</span> Email
                    </label>
                    <input type="text" name="email" wire:model="state.email" class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                </div>
                <div class="mt-1">
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>📞</span> Telefon
                    </label>
                    <input type="text" name="phone" wire:model="state.phone" class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                </div>
                <div class="mt-1">
                    <label for="position" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>💼</span> Stanowisko <span class="text-xs text-gray-400">(opcjonalne)</span>
                    </label>
                    <input type="text" name="position" wire:model="state.position" class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                </div>
            </div>
        </div>
    </div>

</div>