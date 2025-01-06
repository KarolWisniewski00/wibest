<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ustawienia') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET TASK -->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 lg:px-8 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                        <x-nav-link class="h-full text-center" href="{{ route('setting') }}" :active="request()->routeIs('setting')">
                            Moja firma
                        </x-nav-link>
                    </nav>
                </div>

                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!-- Napis z przyciskiem tworzenia -->
                    <div class="pb-4 flex flex-col justify-between items-center">
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Ustawienia
                            </h1>
                            @if ($company)
                            @if($role == 'admin')
                            <a href="{{route('setting.edit', $company)}}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-blue-300 dark:bg-blue-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-400 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                <i class="fa-regular fa-pen-to-square mr-2"></i>Edytuj
                            </a>
                            @endif
                            @else
                            @if($role == 'admin')
                            <a href="{{route('setting.create')}}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-plus mr-2"></i>Utwórz
                            </a>
                            @endif
                            @endif
                        </div>
                    </div>

                    @if ($company)
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                        <div class="flex flex-col gap-4 w-full h-full appearance-none rounded-lg border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                            <div class="flex flex-col md:grid md:gap-4 py-4 border-b border-gray-100 dark:border-gray-700">
                                <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                    Nazwa
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <a href="{{route('setting')}}" class="inline-flex items-center text-blue-300 dark:text-blue-300 font-semibold text-xl uppercase tracking-widest hover:text-blue-700 dark:hover:text-blue-300 transition ease-in-out duration-150">
                                        <span class="mr-2 inline-flex p-2 items-center bg-blue-300 dark:bg-blue-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                            ORG
                                        </span>
                                        {{$company->name}}
                                    </a>
                                    <input type="hidden" value="{{$company->id}}" name="company_id">
                                    <input type="hidden" value="{{$company->name}}" name="seller_name">
                                </p>
                            </div>
                            <div class="flex flex-col md:grid md:gap-4 py-4 border-b border-gray-100 dark:border-gray-700">
                                <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                    Adres
                                </p>
                                <p class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                    {{$company->adress}}
                                    <input type="hidden" value="{{$company->adress}}" name="seller_adress">
                                </p>
                            </div>
                            <div class="flex flex-col md:grid md:gap-4 py-4 border-b border-gray-100 dark:border-gray-700">
                                <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                    NIP
                                </p>
                                <p class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                    {{$company->vat_number}}
                                    <input type="hidden" value="{{$company->vat_number}}" name="seller_vat_number">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 flex flex-col justify-between items-center">
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Użytkownicy
                            </h1>
                        </div>
                    </div>
                    <ul id="list" class="grid w-full gap-y-4 block md:hidden">
                        @if ($users->isEmpty())
                        <div class="text-center py-8">
                            <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                            <p class="text-gray-500 dark:text-gray-400">Brak danych do wyświetlenia.</p>
                        </div>
                        @else
                        @foreach ($invitations as $key => $invitation)
                        <!-- Kod -->
                        <li>
                            <div class="h-full flex flex-col inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                <div class="block w-full">
                                    <div class="flex justify-between w-full">
                                        <div class="flex justify-start items-center w-full justify-start">
                                            <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                                {{ $invitation->user->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <a href="mailto:{{ $invitation->user->email }}" class="my-4 inline-flex items-center text-blue-300 dark:text-blue-300 font-semibold text-xs uppercase tracking-widest hover:text-blue-700 dark:hover:text-blue-300 transition ease-in-out duration-150">
                                        {{ $invitation->user->email }}
                                    </a>
                                </div>
                                <div class="flex flex-col w-full">
                                    <span class="my-2 inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Prośba o dołączenie
                                    </span>
                                    <div class="flex gap-2">
                                        <a href="{{route('setting.user.invitations.accept',$invitation->user->id)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-green-500 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-600 active:bg-green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-check"></i>
                                        </a>
                                        <a href="{{route('setting.user.invitations.reject',$invitation->user->id)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-ban"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($users as $key => $user)
                        <!-- Kod -->
                        <li>
                            <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                <div class="block w-full">
                                    <div class="flex justify-between w-full">
                                        <div class="flex justify-start items-center w-full justify-start">
                                            <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                                {{ $user->name }}
                                            </span>
                                        </div>
                                        @if($role == 'admin')
                                        <a href="{{route('setting.user.disconnect', $user)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-user-minus"></i>
                                        </a>
                                        @endif
                                    </div>
                                    <a href="mailto:{{ $user->email }}" class="my-4 inline-flex items-center text-blue-300 dark:text-blue-300 font-semibold text-xs uppercase tracking-widest hover:text-blue-700 dark:hover:text-blue-300 transition ease-in-out duration-150">
                                        {{ $user->email }}
                                    </a>
                                    @if($user->role == null)
                                    <select name="" class="role min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required data-user-id="{{ $user->id }}">
                                        <option id="isntrole" value="Kliknij i nadaj">Kliknij i nadaj</option>
                                        <option value="admin">admin</option>
                                        <option value="użytkownik">użytkownik</option>
                                    </select>
                                    @elseif($role == 'admin')
                                    <select name="" class="role min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required data-user-id="{{ $user->id }}">
                                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="admin">admin</option>
                                        @if($user_id != $user->id)
                                        <option value="użytkownik">użytkownik</option>
                                        @endif
                                    </select>
                                    @else
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $user->role }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach

                        @endif
                    </ul>
                    <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300  ">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center rounded-tl-lg">
                                    Nazwa
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Rola
                                </th>
                                @if($role == 'admin')
                                <th scope="col" class="px-6 py-3 text-center rounded-tr-lg">
                                    Rozłącz
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->isEmpty())
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <div class="text-center py-8">
                                        <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                        <p class="text-gray-500 dark:text-gray-400">Brak danych do wyświetlenia.</p>
                                    </div>
                                </td>
                            </tr>
                            @else
                            @if($role == 'admin')
                            @foreach ($invitations as $invitation)
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $invitation->user->name }}
                                    </span>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <a href="mailto:{{ $invitation->user->email }}" class="inline-flex items-center text-blue-300 dark:text-blue-300 font-semibold text-xs uppercase tracking-widest hover:text-blue-700 dark:hover:text-blue-300 transition ease-in-out duration-150">
                                        {{ $invitation->user->email }}
                                    </a>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <a href="{{route('setting.user.invitations.accept',$invitation->user->id)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-green-500 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-600 active:bg-green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <a href="{{route('setting.user.invitations.reject',$invitation->user->id)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-ban"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                            @endif
                            @foreach ($users as $user)
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $user->name }}
                                    </span>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <a href="mailto:{{ $user->email }}" class="inline-flex items-center text-blue-300 dark:text-blue-300 font-semibold text-xs uppercase tracking-widest hover:text-blue-700 dark:hover:text-blue-300 transition ease-in-out duration-150">
                                        {{ $user->email }}
                                    </a>
                                </td>
                                @if($user->role == null)
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <select name="" class="role min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required data-user-id="{{ $user->id }}">
                                        <option id="isntrole" value="Kliknij i nadaj">Kliknij i nadaj</option>
                                        <option value="admin">admin</option>
                                        <option value="użytkownik">użytkownik</option>
                                    </select>
                                </td>
                                @elseif($role == 'admin')
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <select name="" class="role min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required data-user-id="{{ $user->id }}">
                                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="admin">admin</option>
                                        @if($user_id != $user->id)
                                        <option value="użytkownik">użytkownik</option>
                                        @endif
                                    </select>
                                </td>
                                @else
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                @endif
                                @if($user_id != $user->id)
                                @if($role == 'admin')
                                <td class="px-3 py-2">
                                    <a href="{{route('setting.user.disconnect', $user)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-user-minus"></i>
                                    </a>
                                </td>
                                @endif
                                @endif
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <input type="hidden" id="url_update_role" value="{{ route('api.user.update.role', ['','']) }}">
                    <script>
                        $(document).ready(function() {
                            toastr.options = {
                                "positionClass": "toast-top-center", // Wyświetl na środku u góry
                                "timeOut": "5000", // Czas trwania (5 sekund)
                                "closeButton": true, // Dodanie przycisku zamknięcia
                                "progressBar": true // Pokaż pasek postępu
                            };
                            // Słuchamy na zmianę w select
                            $('.role').change(function() {
                                var role = $(this).val();
                                var url_update_role = $('#url_update_role').val();
                                var userId = $(this).data('user-id');
                                console.log(userId);
                                // Wysyłamy zapytanie AJAX do serwera
                                $.ajax({
                                    url: url_update_role + '/' + userId + '/' + role,
                                    type: 'GET',
                                    success: function(response) {
                                        $('#isntrole').addClass('hidden');
                                        var success = $('#success').val();
                                        toastr.success('Zaktualizowano');
                                    },
                                    error: function(response) {
                                        var fail = $('#fail').val();
                                        toastr.error('coś poszło nie tak');
                                    }
                                });
                            });
                        });
                    </script>
                    <div class="mt-8 flex justify-end space-x-4">
                        <!-- Green button for marking as completed -->
                        @if($role == 'admin')
                        <a href="{{route('version')}}" class="inline-flex items-center px-4 py-2 bg-indigo-300 dark:bg-indigo-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-400 focus:bg-indigo-700 dark:focus:bg-indigo-300 active:bg-indigo-900 dark:active:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 transition ease-in-out duration-150">
                            <i class="fa-solid fa-clock-rotate-left mr-2"></i>Zobacz historę wersji systemu
                        </a>
                        @endif
                    </div>
                    @else
                    <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Dokończ konfigurację</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Brak danych sprzedawcy. Dodaj informacje o firmie. Przejdź do zakładki ustawienia i kliknij zielony plus
                        </div>
                        <div class="flex">
                            <a href="{{route('setting.create')}}" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                Przejdź do konfiguracji
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- END WIDGET TASK -->
        </div>
    </div>
</x-app-layout>