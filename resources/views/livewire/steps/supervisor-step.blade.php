<div>
    @php
        $users = $this->getUsers();
        $this->getUsersChecked();

        $supervisors = $users->filter(function ($user) {
            return in_array($user->role, ['admin', 'menedżer', 'właściciel']);
        })->values();

        $supervisorCount = $supervisors->count();
    @endphp

    <div class="mb-4">
        <div id="supervisor">
            <x-label-form value="👤 Wybierz przełożonego" />

            @if ($supervisors->isEmpty())
                <x-empty-place />
            @else
                <div x-data="{
                                showAll: false,
                                search: '',
                                limit: 3,
                                userCount: {{ $supervisorCount }},

                                updateLimit() {
                                    this.limit = window.matchMedia('(min-width: 768px)').matches
                                        ? 9
                                        : 3;
                                },

                                matches(name, role) {
                                    const query = this.search.trim().toLocaleLowerCase('pl-PL');

                                    if (!query) {
                                        return true;
                                    }

                                    return name.toLocaleLowerCase('pl-PL').includes(query)
                                        || role.toLocaleLowerCase('pl-PL').includes(query);
                                },

                                get hasSearch() {
                                    return this.search.trim().length > 0;
                                },

                                get canShowMore() {
                                    return this.userCount > this.limit;
                                }
                            }" x-init="updateLimit(); window.addEventListener('resize', () => updateLimit())"
                    class="relative">
                    {{-- Wyszukiwarka przełożonych --}}
                    <div class="relative mb-4">
                        <input type="search" x-model="search" @input="showAll = hasSearch"
                            placeholder="Szukaj przełożonego..." aria-label="Szukaj przełożonego" class="w-full rounded-xl border border-gray-200 bg-white
                                           p-3 pr-11 text-sm text-gray-800
                                           placeholder:text-gray-400
                                           focus:border-green-400 focus:outline-none
                                           focus:ring-2 focus:ring-green-400/20
                                           dark:border-gray-700 dark:bg-gray-800
                                           dark:text-gray-100 dark:placeholder:text-gray-500" />

                        <button type="button" x-cloak x-show="search.length > 0" @click="search = ''; showAll = false"
                            aria-label="Wyczyść wyszukiwanie" class="absolute inset-y-0 right-0 flex items-center px-4
                                           text-gray-400 transition hover:text-gray-700
                                           dark:hover:text-gray-200">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <p x-cloak x-show="hasSearch" class="mb-3 text-sm text-gray-500 dark:text-gray-400" aria-live="polite">
                        Wyniki wyszukiwania
                    </p>

                    {{-- Lista przełożonych --}}
                    <ul class="grid w-full gap-4 md:grid-cols-3">
                        @foreach ($supervisors as $index => $user)
                            @php
                                $userName = trim(
                                    ($user->name ?? '') . ' ' . ($user->surname ?? '')
                                );
                            @endphp

                            <li x-cloak x-show="matches(@js($userName), @js($user->role)) &&
                                                    (hasSearch || showAll || {{ $index }} < limit)">
                                <input name="supervisor_id" wire:model="state.supervisor_id" type="radio"
                                    id="supervisor-{{ $user->id }}" value="{{ $user->id }}" class="hidden peer" />

                                <label for="supervisor-{{ $user->id }}" class="h-full inline-flex items-center justify-between
                                                           w-full p-4 text-gray-500 bg-white border-2
                                                           border-gray-200 rounded-lg cursor-pointer
                                                           transition-all duration-200
                                                           dark:hover:text-gray-300 dark:border-gray-700
                                                           peer-checked:border-green-300
                                                           dark:peer-checked:border-green-300
                                                           hover:text-gray-600 peer-checked:text-gray-600
                                                           hover:bg-gray-50 dark:text-gray-400
                                                           dark:bg-gray-800 dark:hover:bg-gray-700
                                                           dark:peer-checked:text-gray-300">
                                    <div class="flex items-center gap-2">
                                        <x-user-photo :user="$user" />
                                        <x-user-name :user="$user" />
                                    </div>
                                </label>
                            </li>
                        @endforeach
                    </ul>

                    {{-- Pokaż więcej --}}
                    @if ($supervisorCount > 3)
                        <div x-cloak x-show="!hasSearch && !showAll && canShowMore" class="pointer-events-none absolute bottom-[62px] left-0
                                                   w-full h-24 bg-gradient-to-t from-white
                                                   dark:from-gray-800/70 to-transparent"></div>

                        <div class="flex items-center justify-center w-full">
                            <x-button-back x-cloak x-show="!hasSearch && !showAll && canShowMore" type="button" class="mt-4 text-lg w-full md:w-fit
                                                       flex items-center justify-center" @click="showAll = true">
                                Pokaż więcej
                            </x-button-back>
                        </div>
                    @endif
                </div>
            @endif

            <p class="text-red-500 text-sm mt-1 dark:text-red-400">
                {{ $message ?? '' }}
            </p>
        </div>
    </div>
</div>