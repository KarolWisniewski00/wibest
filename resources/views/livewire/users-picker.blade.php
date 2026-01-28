<div
    x-data="{ showAll: false, limit: 3 }"
    class="relative">
    @if(count($selectedUsers) > 0)
    <div class="p-2 pt-0 text-sm rounded-lg">
        <div class="flex flex-col gap-4">

            @if(count($selectedUsers) > 0)
            <span class="text-gray-900 dark:text-white">👤 Dla zespołu</span>
            @endif

            @foreach($selectedUsers as $index => $user)
            <label
                x-show="showAll || {{ $index }} < limit"
                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">

                <div class="flex items-center gap-2">
                    <x-user-photo :user="$user" />
                    <x-user-name :user="$user" class="flex-wrap" />
                </div>
            </label>
            @endforeach

        </div>

        {{-- Gradient --}}
        @if (count($selectedUsers) > 3)
        <div x-show="!showAll"
            class="pointer-events-none absolute bottom-[62px] left-0 w-full h-24 bg-gradient-to-t from-gray-800/70 to-transparent">
        </div>
        @endif

        {{-- Przycisk pokaż więcej --}}
        @if (count($selectedUsers) > 3)
        <div class="flex items-center justify-center w-full">
            <x-button-back x-show="!showAll"
                type="button"
                class="text-lg w-full md:w-fit flex items-center justify-center mt-4"
                @click="showAll = true">
                Pokaż więcej
            </x-button-back>
        </div>
        @endif

    </div>
    @endif
</div>