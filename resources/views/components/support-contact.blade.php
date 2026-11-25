@props(['dashboard' => false])
@php
    $support = config('support');
    $phones = array_values(array_filter($support['phones']));
    $emailLink = 'mailto:' . $support['email'] . '?' . http_build_query([
        'subject' => 'WIBEST — zgłoszenie serwisowe',
        'body' => "Dzień dobry,\r\n\r\nOpis problemu:\r\n\r\nCo miało się wydarzyć:\r\n\r\nKiedy wystąpił problem:\r\n\r\n",
    ], '', '&', PHP_QUERY_RFC3986);
@endphp
<section {{ $attributes->class(['p-4 sm:p-6', 'rounded-lg border border-gray-100 bg-gray-100 shadow dark:border-gray-700 dark:bg-gray-700' => $dashboard, 'rounded-2xl border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-900/40' => !$dashboard]) }} aria-label="Kontakt do serwisu WIBEST">
    <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">
        <div class="min-w-0">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Potrzebujesz pomocy z WIBEST?</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Pojawił się error lub coś nie działa? Skontaktuj się ze mną.</p>
            <div class="mt-5 flex min-w-0 items-start gap-4 text-left">
                <div class="shrink-0 rounded-2xl bg-transparent p-2">
                    <img src="https://ui-avatars.com/api/?name=K+W&amp;color=7F9CF5&amp;background=EBF4FF" alt="{{ $support['name'] }}" class="h-10 w-10 rounded-full" width="40" height="40" loading="lazy">
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500 dark:text-gray-400">Profil właściciela systemu</p>
                    <p class="mt-1 break-words text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $support['name'] }}</p>
                    <div class="mt-2 space-y-2 text-sm text-gray-600 dark:text-gray-300">
                        @foreach($phones as $phone)
                            <a href="tel:{{ preg_replace('/[^+0-9]/', '', $phone) }}" class="flex w-fit items-center gap-2 rounded-lg hover:text-gray-900 hover:underline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500 dark:hover:text-white">
                                <i class="fa-solid fa-phone text-xs" aria-hidden="true"></i>{{ $phone }}
                            </a>
                        @endforeach
                        <a href="mailto:{{ $support['email'] }}" class="flex w-fit items-center gap-2 rounded-lg hover:text-gray-900 hover:underline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500 dark:hover:text-white">
                            <i class="fa-solid fa-envelope text-xs" aria-hidden="true"></i><span class="break-all">{{ $support['email'] }}</span>
                        </a>
                    </div>
                    <div class="mt-3">
                        <span class="rounded-full bg-indigo-300 px-2 py-0.5 text-xs font-semibold uppercase tracking-widest text-gray-900 dark:bg-indigo-300 dark:text-gray-900">Opiekun techniczny</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex shrink-0 flex-col gap-3 xl:max-w-xs">
            <x-button-link-green href="{{ $emailLink }}" class="justify-center gap-2 text-sm">
                <i class="fa-solid fa-envelope" aria-hidden="true"></i>Napisz do mnie
            </x-button-link-green>
            @if($phones)
                <x-button-link-neutral href="tel:{{ preg_replace('/[^+0-9]/', '', $phones[0]) }}" class="justify-center gap-2 text-sm">
                    <i class="fa-solid fa-phone" aria-hidden="true"></i>Zadzwoń do mnie
                </x-button-link-neutral>
            @endif
            <p class="text-xs leading-relaxed text-gray-500 dark:text-gray-400">W zgłoszeniu opisz problem i podaj nazwę zakładki. Możesz dołączyć zrzut ekranu.</p>
        </div>
    </div>
</section>
