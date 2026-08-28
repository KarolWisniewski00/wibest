@props(['user'])
<li {{ $attributes->merge(['class' => 'snap-center px-4']) }}>
    <div class="h-full inline-flex items-center justify-between w-full p-4
                text-gray-500 bg-white border-2 border-gray-200 rounded-lg
                hover:text-gray-600 hover:bg-gray-50
                dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-2">
            <div class="flex justify-between w-full pb-2 border-b-2 border-gray-200 dark:border-gray-700">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs gap-2 !justify-between !w-full">
                        <x-status-gray>
                            Data dołączenia
                        </x-status-gray>
                        <x-status-cello class="!text-end">
                            {{ $user->assigned_at ? $user->assigned_at->format('d.m.Y') : 'Brak danych' }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex justify-between w-full pb-2 border-b-2 border-gray-200 dark:border-gray-700">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs gap-2 !justify-between !w-full">
                        <x-status-gray>
                            Data rozłączenia
                        </x-status-gray>
                        <x-status-cello class="!text-end">
                            {{ $user->unassigned_at ? $user->unassigned_at->format('d.m.Y') : 'Brak danych' }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex justify-between w-full pb-2 border-b-2 border-gray-200 dark:border-gray-700">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs gap-2 !justify-between !w-full">
                        <x-status-gray>
                            Data rozpoczęcia pracy
                        </x-status-gray>
                        <x-status-cello class="!text-end">
                            {{ $user->employment_start ? $user->employment_start->format('d.m.Y') : 'Brak danych' }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex justify-between w-full pb-2 border-b-2 border-gray-200 dark:border-gray-700">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs gap-2 !justify-between !w-full">
                        <x-status-gray>
                            Data zakończenia pracy
                        </x-status-gray>
                        <x-status-cello class="!text-end">
                            {{ $user->employment_end ? $user->employment_end->format('d.m.Y') : 'Brak danych' }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex justify-between w-full pb-2 border-b-2 border-gray-200 dark:border-gray-700">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs gap-2 !justify-between !w-full">
                        <x-status-gray>
                            Rozpoczęcie naliczania
                        </x-status-gray>
                        <x-status-cello class="!text-end">
                            {{ $user->paid_from ? $user->paid_from->format('d.m.Y') : 'Brak danych' }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex justify-between w-full pb-2 border-b-2 border-gray-200 dark:border-gray-700">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs gap-2 !justify-between !w-full">
                        <x-status-gray>
                            Zakończenie naliczania
                        </x-status-gray>
                        <x-status-cello class="!text-end">
                            {{ $user->paid_to ? $user->paid_to->format('d.m.Y') : 'Brak danych' }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex justify-between w-full pb-2 border-b-2 border-gray-200 dark:border-gray-700">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs gap-2 !justify-between !w-full">
                        <x-status-gray>
                            Cena
                        </x-status-gray>
                        <x-status-gray class="!text-end">
                            {{ $user->user_price ? $user->user_price : 'Brak danych' }} PLN
                        </x-status-gray>
                    </x-paragraf-display>
                </div>
            </div>
            <div
                class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                <x-user-photo :user="$user->user_id" />
                <x-user-name :user="$user->user_id" />
            </div>
        </div>
    </div>
</li>