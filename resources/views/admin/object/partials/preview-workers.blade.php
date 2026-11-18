                    <div class="flex flex-col gap-4 border-b border-gray-200 px-5 py-4 dark:border-gray-600 sm:flex-row sm:items-center sm:justify-between [@media(prefers-color-scheme:light)]:border-gray-300">
                        <div class="flex min-w-0 items-center gap-3">
                        <div class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-users text-lg sm:text-2xl" aria-hidden="true"></i>
                        </div>

                        <div>
                            <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                Pracownicy
                            </h2>

                            <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                Osoby pracujące na tym obiekcie
                            </p>
                        </div>

                        </div>
                        <div class="relative w-full shrink-0 sm:w-56">
                            <label for="object-worker-search" class="sr-only">Szukaj pracownika po imieniu i nazwisku</label>
                            <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600" aria-hidden="true"></i>
                            <input id="object-worker-search" data-employee-search type="search" x-model="employeeSearch" @keydown.escape.stop.prevent="clearEmployeeSearch()" maxlength="255" placeholder="Szukaj pracownika..." aria-label="Szukaj pracownika" aria-controls="object-assigned-workers"
                                class="h-9 w-full rounded-lg border border-gray-300 bg-gray-50 pl-9 pr-9 text-xs text-gray-900 placeholder:text-gray-500 outline-none transition focus:border-green-600 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-100 dark:placeholder:text-gray-300 dark:focus:border-green-300/50 dark:focus:ring-green-300/50 [&::-webkit-search-cancel-button]:appearance-none">
                            <button type="button" x-show="employeeSearch.length > 0" x-cloak @click.stop="clearEmployeeSearch()" aria-label="Wyczyść wyszukiwanie pracowników" title="Wyczyść wyszukiwanie" class="absolute right-1 top-1/2 flex h-7 w-7 -translate-y-1/2 items-center justify-center rounded-md text-gray-500 transition-all duration-200 hover:bg-gray-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300 dark:text-gray-300 dark:hover:bg-gray-500 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-xmark text-xs" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="relative overflow-hidden" :aria-busy="reportLoading">
                        <div :class="reportLoading ? 'invisible' : ''" :inert="reportLoading">
                        @if($object->users->isNotEmpty())
                            <div id="object-assigned-workers" data-object-user-list class="max-h-[330px] divide-y divide-gray-200 overflow-y-auto pr-1 dark:divide-gray-600">
                                @foreach($object->users as $user)
                                    <div role="button" tabindex="0" data-employee-id="{{ $user->id }}" data-employee-name="{{ $user->name }}" x-show="matchesEmployee({{ \Illuminate\Support\Js::from($user->name) }})" @click="selectEmployee({{ $user->id }})" @keydown.enter.prevent="selectEmployee({{ $user->id }})" @keydown.space.prevent="selectEmployee({{ $user->id }})"
                                        :aria-pressed="selectedEmployeeId === {{ $user->id }} ? 'true' : 'false'" aria-controls="work-list-results"
                                        :class="selectedEmployeeId === {{ $user->id }} ? 'rounded-xl bg-green-300/20 hover:bg-green-300/30 ring-1 ring-inset ring-green-300' : 'rounded-none bg-transparent hover:rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600'"
                                        class="flex cursor-pointer items-center gap-2 px-3 py-3 font-semibold uppercase tracking-widest text-gray-600 transition-all duration-200 focus-visible:rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300 dark:text-gray-300">
                                        <div class="flex shrink-0 items-center [&>*]:m-0">
                                            <x-user-photo :user="$user" />
                                        </div>
                                        <div class="flex min-w-0 flex-1 flex-wrap items-center gap-2 text-start text-xs leading-tight [&>*]:m-0">
                                            <x-status-gray class="min-w-0 break-words [overflow-wrap:anywhere]">{{ $user->name }}</x-status-gray>
                                            <x-user-role :user="$user" />
                                        </div>
                                        <div class="shrink-0 flex items-center gap-2 text-sm font-semibold text-gray-600 dark:text-gray-300" aria-label="Czas pracy na obiekcie w wybranym miesiącu"><i class="fa-solid fa-clock" aria-hidden="true"></i>{{ intdiv($workReport['worker_seconds'][$user->id] ?? 0, 3600) }}h</div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div id="object-assigned-workers" x-show="employeeSearch.trim().length === 0"><x-empty-place/></div>
                        @endif
                        <p x-show="employeeSearch.trim().length > 0 && !hasMatchingEmployees()" x-cloak role="status" aria-live="polite" class="py-6 text-center text-sm text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Nie znaleziono pracowników</p>
                        </div>
                        <x-object.loading kind="workers" />
                        </div>
                        <div class="mt-4 flex min-h-8 flex-wrap items-center justify-between gap-3 border-t border-gray-200 pt-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
                            <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                                <span>Pracownicy przypisani</span>
                                <span class="font-semibold text-green-800 dark:text-green-300">{{ $object->users->count() }}</span>
                            </div>
                            <button type="button" x-show="selectedEmployeeId !== null" x-cloak @click="selectEmployee(null)" class="ml-auto rounded-lg px-2 py-1 text-xs font-medium text-green-800 transition-all duration-200 hover:bg-green-300/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300 dark:text-green-300">Wyczyść filtry</button>
                        </div>
                    </div>
