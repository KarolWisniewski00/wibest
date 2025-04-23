<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="role-dropdown" data-collapse-toggle="role-dropdown">
                <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Role</span>
                <i class="fa-solid fa-chevron-up"></i>
            </button>
            <ul id="role-dropdown">
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                        <input type="checkbox" class="hidden peer" />
                        <span class="flex whitespace-nowrap peer-checked:bg-green-300 peer-checked:text-gray-900 peer-checked:rounded-lg w-full h-full px-3">Administrator</span>
                    </label>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                        <input type="checkbox" class="hidden peer" />
                        <span class="flex whitespace-nowrap peer-checked:bg-green-300 peer-checked:text-gray-900 peer-checked:rounded-lg w-full h-full px-3">Kierownik</span>
                    </label>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                        <input type="checkbox" class="hidden peer" />
                        <span class="flex whitespace-nowrap peer-checked:bg-green-300 peer-checked:text-gray-900 peer-checked:rounded-lg w-full h-full px-3">Pracownik</span>
                    </label>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                        <input type="checkbox" class="hidden peer" />
                        <span class="flex whitespace-nowrap peer-checked:bg-green-300 peer-checked:text-gray-900 peer-checked:rounded-lg w-full h-full px-3">Menadżer</span>
                    </label>
                </li>
            </ul>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <x-main>
        <x-team.nav :role="$role" :invitations="$invitations" />
        <x-team.header>
            Twój zespół ({{$userCount}})
        </x-team.header>

        <x-flex-center class="px-4 mt-8">
            <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden lg:table">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <x-flex-center>
                                <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </x-flex-center>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Zdjęcie
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Imię i Nazwisko
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Podgląd
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
                    <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                        <td class="px-3 py-2">
                            <x-flex-center>
                                <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="{{ $user->id }}">
                            </x-flex-center>
                        </td>
                        <td class="px-3 py-2 flex items-center justify-center">
                            @if($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                            @else
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            @endif
                        </td>
                        <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                            <x-paragraf-display class="text-xs">
                                {{$user->name}}
                            </x-paragraf-display>
                        </td>
                        <td class="px-3 py-2">
                            @if($user->role == 'admin')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Admin
                            </span>
                            @elseif($user->role == 'menedżer')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-600 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Menedżer
                            </span>
                            @elseif($user->role == 'kierownik')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-600 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Kierownik
                            </span>
                            @elseif($user->role == 'użytkownik')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-600 text-gray-100 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Użytkownik
                            </span>
                            @endif
                        </td>
                        <x-show-cell href="#" />
                    </tr>
                    @endforeach

                    @endif
                </tbody>
            </table>
        </x-flex-center>
    </x-main>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>