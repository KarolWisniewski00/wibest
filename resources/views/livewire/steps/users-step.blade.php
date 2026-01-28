<div>
    @php
    // Upewnij się, że ta metoda (getUsers) jest dostępna w Twoim komponencie Livewire
    $users = $this->getUsers();
    $this->getUsersChecked();
    $userCount = $users->count(); // Dodanie zmiennej z liczbą użytkowników
    @endphp
    <div>
        <div class="mb-4" id="users">
            <x-label-form value="👤 Wybierz użytkowników" />
            @if ($users->isEmpty())
            <x-empty-place />
            @endif

            <div
                x-data="{
                    showAll: false,
                    limit: 3,
                    userCount: {{ $userCount }}, // Przekazanie liczby użytkowników do Alpine
                    updateLimit() {
                        this.limit = window.matchMedia('(min-width: 768px)').matches ? 9 : 3;
                    },
                    get canShowMore() { // Obliczana właściwość do dynamicznego porównania
                        return this.userCount > this.limit;
                    }
                }"
                x-init="updateLimit(); window.addEventListener('resize', updateLimit)"
                class="relative">

                <ul class="grid w-full gap-4 md:grid-cols-3">

                    @foreach ($users as $index => $user)
                    <li x-show="showAll || {{ $index }} < limit">
                        <input name="user_ids[]"
                            wire:model.live="state.user_ids"
                            type="checkbox"
                            id="user-{{ $user->id }}"
                            value="{{ $user->id }}"
                            class="hidden peer">

                        <label for="user-{{ $user->id }}"
                            class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <x-user-photo :user="$user" />
                                <x-user-name :user="$user" />
                            </div>
                        </label>
                    </li>
                    @endforeach

                </ul>

                @if ($userCount > 3) {{-- Opcjonalne: usuń ten blok, jeśli chcesz polegać tylko na x-show --}}

                    {{-- Gradient --}}
                    {{-- Pokazuje się tylko, jeśli nie pokazujemy wszystkich (showAll=false) ORAZ liczba użytkowników przekracza limit --}}
                    <div x-show="!showAll && canShowMore"
                        class="pointer-events-none absolute bottom-[62px] left-0 w-full h-24 bg-gradient-to-t from-white dark:from-gray-800/70 to-transparent">
                    </div>

                    {{-- Przycisk pokaż więcej --}}
                    <div class="flex items-center justify-center w-full">
                        {{-- Pokazuje się tylko, jeśli nie pokazujemy wszystkich (showAll=false) ORAZ liczba użytkowników przekracza limit --}}
                        <x-button-back x-show="!showAll && canShowMore"
                            type="button"
                            class="mt-4 text-lg w-full md:w-fit flex items-center justify-center"
                            @click="showAll = true">
                            Pokaż więcej
                        </x-button-back>
                    </div>

                @endif

            </div>
        </div>
    </div>
</div>