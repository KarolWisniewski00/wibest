@props(['preview' => false])
<div role="status" aria-label="Ładowanie danych" class="my-4 grid grid-cols-1 gap-4 sm:grid-cols-2 {{ $preview ? 'xl:grid-cols-6 2xl:grid-cols-5' : 'xl:grid-cols-6' }} animate-pulse motion-reduce:animate-none">
    @foreach(range(1, $preview ? 5 : 6) as $card)
        <div @class(['rounded-2xl bg-gray-100 p-5 shadow-sm dark:bg-gray-700',
            'xl:col-span-3 2xl:col-span-1' => $preview && $card <= 2,
            'sm:col-span-2' => $preview && $card === 2,
            'xl:col-span-2 2xl:col-span-1' => $preview && $card > 2])>
            <div class="flex items-start gap-4">
                <div class="h-11 w-11 shrink-0 rounded-xl bg-gray-200 dark:bg-gray-600 sm:h-14 sm:w-14"></div>
                <div class="min-w-0 flex-1 space-y-4">
                    <div class="h-4 w-3/4 rounded bg-gray-200 dark:bg-gray-600"></div>
                    <div class="h-9 w-full rounded bg-gray-200 dark:bg-gray-600"></div>
                    <div class="h-3 w-2/3 rounded bg-gray-200 dark:bg-gray-600"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
