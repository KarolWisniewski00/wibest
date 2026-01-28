@if ($hasErrors($errors))
    <div {{ $attributes->merge([
        'class' => '
            rounded-xl 
            bg-white 
            border border-negative-300/60 
            dark:bg-gray-800 dark:border-negative-300/50
            p-4 shadow-sm backdrop-blur-sm
        '
    ]) }}>
        <div class="flex items-center pb-3 border-b border-negative-300/50 dark:border-negative-300/40">
            <x-dynamic-component
                :component="WireUi::component('icon')"
                class="w-6 h-6 text-negative-300 dark:text-negative-300 shrink-0 mr-3"
                name="exclamation-circle"
            />

            <span class="text-sm font-semibold text-negative-300 dark:text-negative-300 tracking-wide">
                {{ str_replace('{errors}', $count($errors), $title) }}
            </span>
        </div>

        <div class="ml-7 mt-3">
            <ul class="list-disc space-y-1 text-sm text-negative-300 dark:text-negative-300 leading-relaxed">
                @foreach ($getErrorMessages($errors) as $message)
                    <li class="animate-[fadeIn_0.25s_ease-out]">
                        {{ head($message) }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <div class="hidden"></div>
@endif
