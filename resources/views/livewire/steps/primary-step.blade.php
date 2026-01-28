<div>

    <div class="mb-4">
        <div id="manager">
            <x-label-form value="📋 Wprowadź dane podstawowe" />
            <div>
                <div class="mt-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>👤</span> Imię i nazwisko
                    </label>
                    <input type="text" name="name" wire:model="state.name" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                </div>
                <div class="mt-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>✉️</span> Email
                    </label>
                    <input type="text" name="email" wire:model="state.email" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                </div>
                <div class="mt-2">
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>📞</span> Telefon
                    </label>
                    <input type="text" name="phone" wire:model="state.phone" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                </div>
                <div class="mt-2">
                    <label for="position" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>💼</span> Stanowisko <span class="text-xs text-gray-400">(opcjonalne)</span>
                    </label>
                    <input type="text" name="position" wire:model="state.position" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                </div>
                <div class="mt-2">
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🚻</span> Płeć
                    </label>

                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            💖 Kobieta
                        </span>
                        <input id="gender" type="checkbox" name="gender" wire:model="state.gender" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-pink-300 rounded-full peer dark:bg-pink-300
                            peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                            after:content-[''] after:absolute after:top-0.5 after:start-[2px]
                            after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                            transition-colors duration-300 ease-in-out
                            peer-checked:bg-blue-300 dark:peer-checked:bg-blue-300">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            💙 Mężczyzna
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>

</div>