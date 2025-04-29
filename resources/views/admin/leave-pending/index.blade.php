<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-date-filter />
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
            <span class="font-medium">Ostrzeżenie!</span> Wyszukiwarka nie jest jeszcze dostępna.
        </div>
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-leave.nav :role="$role" :leavePending="$leavePending" />
        <!--HEADER-->
        <x-leave.header>
            Do rozpatrzenia
        </x-leave.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mx-2 mt-8 ">
            {{ $startDate }} - {{ $endDate }}
        </x-status-cello>
        <!--CONTENT-->
        <x-flex-center class="px-4 pb-4 flex flex-col">
            <!--MOBILE VIEW-->
            <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">
                <!-- PC VIEW -->
                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Zdjęcie
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Imię i Nazwisko
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Data od
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Data do
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Typ
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Akceptuj
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Anuluj
                            </th>
                        </tr>
                    </thead>
                    <tbody id="work-sessions-body">
                        @if ($leaves->isEmpty())
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="8" class="px-3 py-2">
                                <x-empty-place />
                            </td>
                        </tr>
                        @else
                        @foreach ($leaves as $leave)
                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                            <td class="px-3 py-2 flex items-center justify-center">
                                @if($leave->user->profile_photo_url)
                                <img src="{{ $leave->user->profile_photo_url }}" alt="{{ $leave->user->name }}" class="w-10 h-10 rounded-full">
                                @else
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                    {{ strtoupper(substr($leave->user->name, 0, 1)) }}
                                </div>
                                @endif
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    {{$leave->user->name}}
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    {{$leave->start_date}}
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    {{$leave->end_date}}
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    @if($leave->status == 'oczekujące')
                                    <x-status-yellow>
                                        {{ $leave->status }}
                                    </x-status-yellow>
                                    @elseif($leave->status == 'zaakceptowane')
                                    <x-status-green>
                                        {{ $leave->status }}
                                    </x-status-green>
                                    @elseif($leave->status == 'odrzucone')
                                    <x-status-red>
                                        {{ $leave->status }}
                                    </x-status-red>
                                    @endif
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    {{$leave->type}}
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2">
                                <x-button-link-green href="{{ route('leave.pending.accept', $leave)}}" class="min-h-[38px]">
                                    <i class="fa-solid fa-check"></i>
                                </x-button-link-green>
                            </td>
                            <td class="px-3 py-2">
                                <x-button-link-red href="{{ route('leave.pending.reject', $leave)}}" class="min-h-[38px]">
                                    <i class="fa-solid fa-xmark"></i>
                                </x-button-link-red>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <div id="loader" class="text-center py-4 hidden text-gray-700 dark:text-gray-50">Ładowanie...</div>
                </table>
            </div>
        </x-flex-center>
        <!--CONTENT-->
    </x-main>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>