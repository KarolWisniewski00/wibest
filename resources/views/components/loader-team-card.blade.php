<li {{ $attributes }} class="animate-pulse">
    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col w-full gap-4">

            {{-- Status --}}
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start">
                    <div class="h-4 rounded-full bg-gray-200 dark:bg-gray-700 w-24"></div>
                </div>
            </div>

            {{-- Kierownik --}}
            <div class="flex justify-start items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700"></div>
                <div class="flex flex-col justify-center gap-2 w-32 py-4">
                    <div class="h-3 rounded-lg bg-gray-200 dark:bg-gray-700 w-3/4"></div>
                    <div class="h-2 rounded-lg bg-gray-200 dark:bg-gray-700 w-1/2"></div>
                </div>
            </div>

            {{-- Przyciski (Edit i Cancel) --}}
            <div class="flex space-x-4">
                <div class="min-h-[38px] w-[54px] rounded-lg bg-gray-200 dark:bg-gray-700"></div>
            </div>
        </div>
    </div>
</li>