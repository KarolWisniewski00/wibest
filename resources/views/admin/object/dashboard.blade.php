<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <x-sidebar-left>
            <x-filter-date-user loader="objects">{{ route('object.dashboard') }}</x-filter-date-user>
            <input type="hidden" id="start_date" value="{{ $startDate }}">
            <input type="hidden" id="end_date" value="{{ $endDate }}">
        </x-sidebar-left>
        <x-main>
            <x-object.nav />
            <x-container-content style="box-shadow: 0 0 #0000;">
                <div class="my-4 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 sm:h-14 w-11 sm:w-14 items-center justify-center rounded-xl sm:rounded-2xl bg-green-300/10 text-green-300 [@media(prefers-color-scheme:light)]:text-green-700 [@media(prefers-color-scheme:light)]:bg-green-100">
                            <i class="fa-solid fa-cube text-2xl"></i>
                        </div>
                        <div class="text-start">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Obiekty</h1>
                            <p class="text-sm text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Centrum zarządzania obiektami</p>
                        </div>
                    </div>
                    <x-button-link-green href="{{ route('object.create') }}"><i class="fa-solid fa-plus mr-2"></i>Dodaj obiekt</x-button-link-green>
                </div>

                <div x-data="wibestObjectPreview({ endpoint: {{ \Illuminate\Support\Js::from(route('object.dashboard')) }}, month: {{ \Illuminate\Support\Js::from($month->format('Y-m')) }}, dashboard: true, deferred: {{ \Illuminate\Support\Js::from($deferReport ?? false) }}, startDate: @js($startDate), endDate: @js($endDate), initialFilters: @js(request()->only(['search', 'status', 'work_search', 'work_category'])) })" @object-date-range.window="changeRange($event.detail)">
                    @include('admin.object.partials.date-navigation')
                    
                    <p x-show="error" x-cloak role="alert" class="mb-3 text-sm text-red-700 dark:text-red-300"><span x-text="error"></span><button type="button" @click="changeMonth(pendingUrl)" class="ml-2 underline">Spróbuj ponownie</button></p>
                    <div x-ref="cards">@include('admin.object.partials.work-cards', ['dashboard' => true])</div>
                <div class="mb-4 grid grid-cols-1 gap-4 xl:grid-cols-3">
                    @include('admin.object.partials.map')
                    <div class="flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                        <div class="flex items-center gap-3 border-b border-gray-200 px-5 py-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
                            <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300 flex">
                                <i class="fa-solid fa-chart-line text-lg sm:text-2xl" aria-hidden="true"></i>
                            </div>
                            <div class="text-start">
                                <h2 class="text-sm font-semibold text-gray-900 dark:text-white">Status obiektów</h2>
                                <p class="text-xs text-gray-600 dark:text-gray-300">Aktualny podział</p>
                            </div>
                        </div>
                        @php
                            $colors = ['planned' => '#93c5fd', 'active' => '#86efac', 'paused' => '#facc15', 'cancelled' => '#fca5a5', 'completed' => '#6b7280'];
                            $segments = []; $angle = 0;
                            foreach ($colors as $status => $color) {
                                $next = $angle + ($total ? $counts->get($status, 0) / $total * 360 : 0);
                                if ($next > $angle) {
                                    $segments[] = "$color {$angle}deg {$next}deg";
                                }
                                $angle = $next;
                            }
                            $objectLabel = $total == 1 ? 'obiekt' : (
                                in_array($total % 10, [2, 3, 4]) && !in_array($total % 100, [12, 13, 14])
                                    ? 'obiekty' : 'obiektów'
                            );
                        @endphp
                        <div class="flex flex-1 flex-col justify-center gap-6 px-6 py-5">
                            <div class="mx-auto flex h-40 w-40 shrink-0 items-center justify-center rounded-full bg-gray-200 dark:bg-gray-600"
                                style="{{ $total ? 'background: conic-gradient('.implode(',', $segments).')' : '' }}"
                                role="img" aria-label="Podział statusów: {{ $total }} {{ $objectLabel }}. Szczegóły na liście poniżej.">
                                <div class="flex h-28 w-28 flex-col items-center justify-center rounded-full bg-white dark:bg-gray-700">
                                    <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ $total }}</span>
                                    <span class="text-xs text-gray-600 dark:text-gray-300">{{ $objectLabel }}</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                @foreach($colors as $status => $color)
                                    <a data-object-status-link href="{{ route('object.dashboard', ['start_date' => $startDate, 'end_date' => $endDate, 'status' => $status, 'month' => $month->format('Y-m')]) }}" class="flex items-center justify-between gap-3 rounded-md text-sm text-gray-700 transition hover:text-green-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-600 dark:text-gray-300 dark:hover:text-green-200 dark:focus-visible:ring-green-300">
                                        <span class="flex items-center gap-3"><span class="h-2.5 w-2.5 shrink-0 rounded-full ring-1 ring-black/10" style="background: {{ $color }}" aria-hidden="true"></span>{{ \App\Models\WorkObject::STATUSES[$status] }}</span><strong class="font-semibold tabular-nums text-gray-900 dark:text-white">{{ $counts->get($status, 0) }}</strong>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div x-ref="objects">@if($deferReport ?? false)<x-object.table-skeleton label="Lista obiektów" />@else @include('admin.object.partials.list') @endif</div>
                <div x-ref="work">@if($deferReport ?? false)<x-object.table-skeleton />@else @include('admin.object.partials.work-table', ['dashboard' => true]) @endif</div>
                </div>
            </x-container-content>
        </x-main>
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>
