<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <aside id="sidebar-multi-level-sidebar" class="fixed mt-20 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border-t-2 dark:border-gray-600">
            <ul class="space-y-2 font-medium">
                <li>
                    <input placeholder="Szukaj" type="text" class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-100 dark:border-gray-700 bg-gray-100 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50 dark:focus:border-2 dark:focus:border-lime-500" />
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="pracownicy-dropdown" data-collapse-toggle="pracownicy-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Pracownicy</span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                    <ul id="pracownicy-dropdown" class="">
                        <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                                <input type="radio" name="workers" class="hidden peer" checked />
                                <span class="flex whitespace-nowrap peer-checked:bg-lime-700 peer-checked:rounded-lg w-full h-full px-3">Wszyscy</span>
                            </label>
                        </li>
                        <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                                <input type="radio" name="workers" class="hidden peer" />
                                <span class="flex whitespace-nowrap peer-checked:bg-lime-700 peer-checked:rounded-lg w-full h-full px-3">Zaproszenia</span>
                            </label>
                        </li>
                    </ul>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="role-dropdown" data-collapse-toggle="role-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Role</span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                    <ul id="role-dropdown">
                        <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                                <input type="checkbox" class="hidden peer" />
                                <span class="flex whitespace-nowrap peer-checked:bg-lime-700 peer-checked:rounded-lg w-full h-full px-3">Administrator</span>
                            </label>
                        </li>
                        <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                                <input type="checkbox" class="hidden peer" />
                                <span class="flex whitespace-nowrap peer-checked:bg-lime-700 peer-checked:rounded-lg w-full h-full px-3">Kierownik</span>
                            </label>
                        </li>
                        <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                                <input type="checkbox" class="hidden peer" />
                                <span class="flex whitespace-nowrap peer-checked:bg-lime-700 peer-checked:rounded-lg w-full h-full px-3">Pracownik</span>
                            </label>
                        </li>
                        <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                                <input type="checkbox" class="hidden peer" />
                                <span class="flex whitespace-nowrap peer-checked:bg-lime-700 peer-checked:rounded-lg w-full h-full px-3">Menadżer</span>
                            </label>
                        </li>
                    </ul>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="tags-dropdown" data-collapse-toggle="tags-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Tagi</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <ul id="tags-dropdown" class="hidden">
                    </ul>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="positions-dropdown" data-collapse-toggle="positions-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Stanowiska</span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                    <ul id="positions-dropdown">
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <script>
        $(document).ready(function() {
            $('[data-collapse-toggle]').on('click', function() {
                var target = $(this).attr('aria-controls');
                $('#' + target).toggleClass('hidden');
                $(this).find('i').toggleClass('fa-chevron-up fa-chevron-down');
            });
        });
    </script>
    <div class="p-4 sm:ml-64">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                    <!--HEADER-->
                    <x-container-header>
                        <x-h1-display>
                            Twój zespół ({{$user_count}})
                        </x-h1-display>
                        <x-flex-center>
                            <x-button-link-green class="text-xs mx-2">
                                <i class="fa-solid fa-plus mr-2"></i>Dodaj
                            </x-button-link-green>
                            <x-button-link-neutral class="text-xs mx-2">
                                <i class="fa-solid fa-download mr-2"></i>Importuj
                            </x-button-link-neutral>
                            <x-button-link-neutral class="text-xs mx-2">
                                <i class="fa-solid fa-print mr-2"></i>Drukuj karty QR
                            </x-button-link-neutral>
                            <x-button-link-cello class="text-xs ml-2">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </x-button-link-cello>
                        </x-flex-center>
                    </x-container-header>
                    <!--HEADER-->
                    <x-flex-center class="px-4">
                        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <x-flex-center>
                                            <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </x-flex-center>
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Imię i Nazwisko
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Stanowisko
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->isEmpty())
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="8" class="px-3 py-2">
                                        <div class="text-center py-8">
                                            <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                            <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                @foreach ($users as $user)
                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-3 py-2">
                                        <x-flex-center>
                                            <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </x-flex-center>
                                    </td>
                                    <td class="px-3 py-2">
                                        @if($user->profile_photo_path)
                                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">
                                        {{$user->name}}
                                    </td>
                                    @if($user->role == null)
                                    <td class="px-3 py-2">
                                        <select name="" class="role min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required data-user-id="{{ $user->id }}">
                                            <option id="isntrole" value="Kliknij i nadaj">Kliknij i nadaj</option>
                                            <option value="admin">admin</option>
                                            <option value="użytkownik">użytkownik</option>
                                        </select>
                                    </td>
                                    @elseif($role == 'admin')
                                    <td class="px-3 py-2">
                                        <select name="" class="role min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required data-user-id="{{ $user->id }}">
                                            <option value="{{ $user->role }}">{{ $user->role }}</option>
                                            <option value="admin">admin</option>
                                            @if($user_id != $user->id)
                                            <option value="użytkownik">użytkownik</option>
                                            @endif
                                        </select>
                                    </td>
                                    @else
                                    <td class="px-3 py-2">
                                        <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    @endif
                                    <td class="px-3 py-2">

                                    </td>
                                    <td class="px-3 py-2">
                                        <x-button-link-cello class="text-xs ml-2">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </x-button-link-cello>
                                    </td>
                                </tr>
                                @endforeach
                                
                                @endif
                            </tbody>
                        </table>
                    </x-flex-center>
                </div>
            </div>
        </div>
    </div>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>