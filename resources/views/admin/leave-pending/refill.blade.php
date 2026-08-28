<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            <li>
                <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                    Uzupełniasz planing aby móc zaakceptować wniosek
                </div>
            </li>
            <li>
                <div>
                    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4 flex-wrap">
                        <span class="text-gray-900 dark:text-white">📅 Zakres</span>
                        <x-status-cello>
                            @if($leave->start_date != '')
                                {{\Carbon\Carbon::createFromFormat('Y-m-d', $leave->start_date)->format('d.m.Y') ?? ''}}
                            @endif
                            <span class="px-2">-</span>
                            @if($leave->end_date != '')
                                {{\Carbon\Carbon::createFromFormat('Y-m-d', $leave->end_date)->format('d.m.Y') ?? ''}}
                            @endif
                        </x-status-cello>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    @if($leave->type != '')
                        <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4">
                            <span class="text-gray-900 dark:text-white">📋 Podgląd</span>
                            <div class="h-[180px] flex flex-col items-center justify-center text-center 
                                                    w-full bg-pink-200 dark:bg-pink-400/60
                                                    rounded-2xl p-2 transition-colors duration-200 
                                                    hover:bg-pink-300 dark:hover:bg-pink-500/70">
                                <!-- Ikona i label -->
                                <div class="flex flex-col items-center justify-center h-full w-fit">
                                    <span class="text-2xl">{{ config('leavetypes.icons.' . $leave->type, '') }}</span>
                                    <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                            bg-pink-300 text-gray-900 uppercase tracking-widest">
                                        {{ config('leavetypes.shortType.' . $leave->type, '') }}
                                    </span>
                                </div>

                                <!-- Dane szczegółowe -->
                                <div
                                    class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                                    <div class="font-semibold tracking-widest uppercase">
                                        {{$leave->type}}
                                    </div>

                                    <div
                                        class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                                        @if($leave->start_date != '')
                                                            {{
                                            \Carbon\Carbon::parse($leave->start_date)
                                                ->locale('pl')
                                                ->translatedFormat('D') 
                                                                                                        }}
                                        @else
                                            Brak
                                        @endif
                                        –
                                        @if($leave->end_date != '')
                                                            {{
                                            \Carbon\Carbon::parse($leave->end_date)
                                                ->locale('pl')
                                                ->translatedFormat('D') 
                                                                                                        }}
                                        @else
                                            Brak
                                        @endif
                                    </div>
                                </div>

                                <!-- Opis -->
                                <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                                    WNIOSEK
                                </p>

                            </div>
                        </div>
                    @endif
                </div>
            </li>
            <li>
                <div class="relative">
                    <div class="p-2 pt-0 text-sm rounded-lg">
                        <div class="flex flex-col gap-4">
                            <span class="text-gray-900 dark:text-white">👤 Dla użytkownika</span>
                            @foreach($users as $index => $user)
                                <label
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">

                                    <div class="flex items-center gap-2">
                                        <x-user-photo :user="$user" />
                                        <x-user-name :user="$user" class="flex-wrap" />
                                    </div </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </li>
        </x-sidebar-left>
        <!--SIDE BAR-->

        <!--MAIN-->
        <x-main>
            <x-leave.nav :role="$role" :leavePending="$leavePending" />
            <!--CONTENT-->
            <div class="p-4">
                <!--POWRÓT-->
                <x-button-link-back href="{{ route('leave.pending.index') }}" class="text-lg mb-4">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do wniosków
                </x-button-link-back>
                <h2 class="text-xl font-semibold dark:text-white mb-4 text-center">Uzupełnij planing</h2>
                <!--POWRÓT-->
                <form id="myForm" method="POST" action="" class="space-y-4">
                    @csrf
                    <!--PC VIEW-->
                    <x-table-calendar :headers="array_merge(['Nazwa'], $dates)" :items="$users"
                        emptyMessage="Brak użytkowników do wyświetlenia." :checkBox="false">
                        @foreach($users as $user)
                            <x-row-planing :user="$user" />
                        @endforeach
                    </x-table-calendar>
                    <!--PC VIEW-->
                    <div class="flex justify-end mt-4">
                        <x-button-link-green href="{{ route('leave.pending.accept', $leave)}}"
                            class="min-h-[38px] is_used_{{$leave->id}} {{$leave->is_used ? 'hidden' : ''}}">
                            <i class="fa-solid fa-check mr-2"></i>Akceptuj
                        </x-button-link-green>
                    </div>
                </form>

            </div>
            <!--CONTENT-->
        </x-main>
        <!--MAIN-->
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>