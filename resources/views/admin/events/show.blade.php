<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            <li>
                <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                    Podgląd elementu zdarzenia START lub STOP który jest częścią elementu RCP
                </div>
            </li>
        </x-sidebar-left>
        <!--SIDE BAR-->

        <!--MAIN-->
        <!--MAIN-->
        <x-main>
            <x-RCP.nav :countEvents="$countEvents" />

            <!--CONTENT-->
            <div class="p-4">
                <!--POWRÓT-->
                <x-button-link-back href="{{ route('rcp.event.index') }}" class="text-lg mb-4">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                </x-button-link-back>
                <!--POWRÓT-->
                @if($event->event_type == 'start')
                    <x-container-gray>
                        <!--status-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Zdarzenie
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-green>
                                        🟢 Start
                                    </x-status-green>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--status-->
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-cello>
                                        📅
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->format('d.m.Y H:i:s') ?? '' }}
                                    </x-status-cello>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        @include('admin.events.partials.location')
                    </x-container-gray>
                @endif
                @if($event->event_type == 'stop')
                    <x-container-gray>
                        <!--status-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Zdarzenie
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-red>
                                        🔴 Stop
                                    </x-status-red>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--status-->
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-cello>
                                        📅
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->format('d.m.Y H:i:s') ?? '' }}
                                    </x-status-cello>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        @include('admin.events.partials.location')
                    </x-container-gray>
                @endif
                @if($event->event_type == 'task')
                    <x-container-gray class="md:col-span-2">
                        <x-text-cell>
                            <x-text-cell-label>
                                Zdarzenie
                            </x-text-cell-label>
                            <x-status-gray class="text-2xl">
                                🎯 Zadanie
                            </x-status-gray>
                        </x-text-cell>
                        @if($event->status != null)
                            <x-text-cell>
                                <x-text-cell-label>
                                    Status
                                </x-text-cell-label>
                                @if($event->status == 'oczekujące')
                                    <x-status-yellow class="text-2xl">
                                        🟡 {{ $event->status }}
                                    </x-status-yellow>
                                @elseif($event->status == 'zaakceptowane')
                                    <x-status-green class="text-2xl">
                                        🟢 {{ $event->status }}
                                    </x-status-green>
                                @elseif($event->status == 'odrzucone')
                                    <x-status-red class="text-2xl">
                                        🔴{{ $event->status }}
                                    </x-status-red>
                                @endif
                            </x-text-cell>
                        @endif
                        <x-text-cell>
                            <x-text-cell-label>
                                Treść
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <div
                                    class="text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                                    {!! $event->note !!}
                                </div>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-cello>
                                        📅
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->format('d.m.Y H:i:s') ?? '' }}
                                    </x-status-cello>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        @if($event->note != null)
                            @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                                @if($event->status == 'oczekujące')
                                    <x-button-link-green href="{{ route('rcp.event.accept', $event) }}" class="text-lg">
                                        <i class="fa-solid fa-check mr-2"></i>Akceptuj
                                    </x-button-link-green>
                                    <x-button-link-red href="{{ route('rcp.event.reject', $event) }}" class="text-lg">
                                        <i class="fa-solid fa-xmark mr-2"></i>Odrzuć
                                    </x-button-link-red>
                                @endif
                                @if($event->status == 'odrzucone')
                                    <x-button-link-green href="{{ route('rcp.event.accept', $event) }}" class="text-lg">
                                        <i class="fa-solid fa-check mr-2"></i>Akceptuj
                                    </x-button-link-green>
                                @endif
                                @if($event->status == 'zaakceptowane')
                                    <x-button-link-red href="{{ route('rcp.event.reject', $event) }}" class="text-lg">
                                        <i class="fa-solid fa-xmark mr-2"></i>Odrzuć
                                    </x-button-link-red>
                                @endif
                            @endif
                        @endif
                    </x-container-gray>
                @endif

                <x-label class="py-2 mt-4">
                    Utworzono
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->created_at)->format('d.m.Y H:i:s') ?? '' }}
                </x-label>
                <x-label class="py-2">
                    Utworzono przez {{ $event->created_user?->name ?? 'System lub usunięty użytkownik' }}
                </x-label>
                <x-label class="py-2">
                    Ostatnia aktualizacja
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->updated_at)->format('d.m.Y H:i:s') ?? '' }}
                </x-label>
                <x-label class="py-2">
                    Historia zmian
                </x-label>
                <section>
                    <div class="max-w-2xl flex flex-col gap-4">
                        @foreach($logs as $log)
                            @php
                                $new = $log->properties['attributes'] ?? [];
                                $old = $log->properties['old'] ?? [];
                            @endphp
                            <x-container-gray>
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-1 font-semibold uppercase tracking-widest">
                                            @if($log->causer)
                                                <x-user-photo :user="$log->causer" />
                                                <x-user-name :user="$log->causer" />
                                            @else
                                                <img src="https://ui-avatars.com/api/?name=S&amp;color=7F9CF5&amp;background=EBF4FF" alt="System" class="flex-shrink-0 w-10 h-10 rounded-full">
                                                <div class="flex flex-wrap items-center gap-2 text-start text-xs">
                                                    <span class="inline-flex items-center text-gray-900 dark:text-gray-50 font-semibold uppercase tracking-widest transition ease-in-out duration-150">System</span>
                                                    <div class="flex items-center gap-2 text-start">
                                                        <x-label-violet>Brak Roli</x-label-violet>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $log->created_at->locale('pl')->diffForHumans() }}
                                        </p>
                                    </div>
                                </footer>

                                <div class="text-gray-700 dark:text-gray-300 text-sm space-y-1">
                                    @foreach($new as $field => $value)
                                        <div>
                                            <span class="font-semibold">{{ $field }}:</span>

                                            <span class="text-red-300 line-through mr-2">
                                                {{ $old[$field] ?? '-' }}
                                            </span>

                                            <span class="text-green-300">
                                                {{ $value }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </x-container-gray>
                        @endforeach
                    </div>
                </section>
            </div>
            <!--CONTENT-->
        </x-main>
        <!--MAIN-->
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>
