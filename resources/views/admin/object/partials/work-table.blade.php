<section :inert="reportLoading" class="my-4 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 border border-gray-300 dark:border-gray-600" data-object-work-table @wibest:object-month-changing.window="destroy()" x-data="wibestObjectList({ kind: 'work', endpoint: {{ \Illuminate\Support\Js::from(($dashboard ?? false) ? route('object.dashboard', ['start_date' => $startDate ?? null, 'end_date' => $endDate ?? null, 'month' => $month->format('Y-m')]) : route('object.show', ['object' => $object, 'month' => $month->format('Y-m'), 'employee_id' => $workReport['selected_employee_id']])) }}, search: {{ \Illuminate\Support\Js::from($workReport['search']) }}, status: {{ \Illuminate\Support\Js::from($workReport['category']) }} })">
    <div class="flex flex-col gap-4 border-b border-gray-200 px-5 py-4 dark:border-gray-600 sm:flex-row sm:items-center sm:justify-between [@media(prefers-color-scheme:light)]:border-gray-300">
        <div class="flex min-w-0 items-center gap-3">
            <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300 flex"><i class="fa-solid fa-clock text-lg sm:text-2xl" aria-hidden="true"></i></div>
            <div class="min-w-0 text-start">
                <h2 id="work-list-title" class="text-sm font-semibold text-gray-900 dark:text-white">{{ ($dashboard ?? false) ? 'Czas pracy' : 'Czas pracy na obiekcie' }}</h2>
                <p class="text-xs text-gray-600 dark:text-gray-300">Wszystkie sesje czasu pracy z wybranego {{ ($dashboard ?? false) ? 'okresu' : 'miesiąca' }} · {{ ($periodLabel ?? $month->format('m.Y')) }}</p>
            </div>
        </div>
        <form @submit.prevent="load(1)" method="GET" action="{{ ($dashboard ?? false) ? route('object.dashboard') : route('object.show', $object) }}" class="relative w-full shrink-0 sm:w-56">
            @foreach(array_merge(request()->only('search', 'status', 'page'), ['month' => $month->format('Y-m'), 'work_category' => $workReport['category'], 'employee_id' => $workReport['selected_employee_id']]) as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}" @if($key === 'work_category') :value="status" @endif>
            @endforeach
            <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600" aria-hidden="true"></i>
            <input type="search" name="work_search" :value="search" @input="searchChanged($event.target.value)" value="{{ $workReport['search'] }}" maxlength="255" placeholder="Szukaj czasu pracy..." aria-label="Szukaj czasu pracy po pracowniku lub obiekcie" aria-controls="work-list-results" class="h-9 w-full rounded-lg border border-gray-300 bg-gray-50 pl-9 pr-9 text-xs text-gray-900 placeholder:text-gray-500 outline-none transition focus:border-green-600 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-100 dark:placeholder:text-gray-300 dark:focus:border-green-300/50 dark:focus:ring-green-300/50">
            <span x-show="loading" x-cloak class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-green-700 dark:text-green-300" role="status"><i class="fa-solid fa-spinner animate-spin motion-reduce:animate-none text-xs" aria-hidden="true"></i><span class="sr-only">Ładowanie wyników…</span></span>
        </form>
    </div>
    <div class="flex flex-wrap items-center gap-2 border-b border-gray-200 px-5 py-3 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300" aria-label="Filtruj czas pracy według kategorii">
        @foreach(['all' => 'Wszystkie', 'under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny', 'attention' => 'Wymaga uwagi'] as $category => $label)
            <a href="{{ ($dashboard ?? false) ? route('object.dashboard', array_merge(request()->only('search', 'status', 'work_search', 'start_date', 'end_date'), ['month' => $month->format('Y-m'), 'work_category' => $category])) : route('object.show', ['object' => $object, 'month' => $month->format('Y-m'), 'work_category' => $category, 'work_search' => $workReport['search'], 'employee_id' => $workReport['selected_employee_id']]) }}"
                @click.prevent="selectStatus('{{ $category }}')" :aria-current="status === '{{ $category }}' ? 'true' : 'false'"
                :class="{ 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300': status === '{{ $category }}', 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-gray-200': status !== '{{ $category }}' }"
                @class([
                    'rounded-lg px-3 py-1.5 text-xs font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-600 dark:focus-visible:ring-green-300',
                    'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300' => $workReport['category'] === $category,
                    'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-gray-200' => $workReport['category'] !== $category,
                ])>{{ $label }}</a>
        @endforeach
    </div>
    <div x-show="error" x-cloak role="alert" class="px-5 py-3 text-sm text-red-700 dark:text-red-300"><span x-text="error"></span><button type="button" @click="load(retryPage)" class="ml-2 underline">Spróbuj ponownie</button></div>
    <div class="relative overflow-hidden" :aria-busy="loading || reportLoading">
    <div x-ref="results" :aria-busy="loading || reportLoading" @click="paginate($event)" wire:ignore :inert="loading || reportLoading" :class="(loading || reportLoading) ? 'object-results-pending' : ''">
        @include('admin.object.partials.work-results')
    </div>
        <x-object.loading kind="table" pending="loading || reportLoading" />
    </div>
    <span class="sr-only" role="status" aria-live="polite" x-text="loading ? 'Aktualizowanie czasu pracy…' : announcement"></span>
</section>
