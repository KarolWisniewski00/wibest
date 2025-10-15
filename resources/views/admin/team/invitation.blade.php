<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Podgląd zaproszeń do zespołu.
            </div>
            @if($role == 'admin')
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <span class="font-medium">Ostrzeżenie!</span> Możesz zaakceptować lub odrzucić zaproszenie.
            </div>
            @endif
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->
    <div class="p-4 sm:ml-64">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <!--NAV-->
                    <div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                            <x-nav-link class="h-full text-center"
                                href="{{ route('team.user.index') }}"
                                :active="Str::startsWith(request()->path(), 'dashboard/team/user')">
                                Zespół
                            </x-nav-link>
                            @if($role == 'admin')
                            <x-nav-link class="h-full text-center"
                                href="{{ route('team.invitation.index') }}"
                                :active="Str::startsWith(request()->path(), 'dashboard/team/invitation')">
                                Zaproszenia
                                @if($invitations->count() > 0)
                                <span class="ml-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                    {{ $invitations->count() }}
                                </span>
                                @endif
                            </x-nav-link>
                            @endif
                        </nav>
                    </div>
                    <!--NAV-->
                    <!--HEADER-->
                    <x-container-header>
                        <x-h1-display>
                            Zaproszenia ({{$invitationCount}})
                        </x-h1-display>
                    </x-container-header>
                    <x-label class="px-4">
                        Osoby które chciałyby dołączyć do Twojego zespołu. Możesz zaakceptować lub odrzucić zaproszenie.
                    </x-label>
                    <!--HEADER-->

                    <div class="px-4 my-8">
                        @foreach ($invitations as $key => $i)
                        <!-- Kod -->
                        <li>
                            <div class="h-full flex flex-col inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                <div class="block w-full">
                                    <div class="flex justify-between w-full">
                                        <div class="flex justify-start items-center w-full justify-start">
                                            <span class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                                @if($i->user->profile_photo_url)
                                                <img src="{{ $i->user->profile_photo_url }}" alt="{{ $i->user->name }}" class="w-10 h-10 rounded-full">
                                                @else
                                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                                    {{ strtoupper(substr($i->user->name, 0, 1)) }}
                                                </div>
                                                @endif
                                                {{ $i->user->name }}
                                                @if($i->user->role == 'admin')
                                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Admin
                                                </span>
                                                @elseif($i->user->role == 'menedżer')
                                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-600 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Menedżer
                                                </span>
                                                @elseif($i->user->role == 'kierownik')
                                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-600 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Kierownik
                                                </span>
                                                @elseif($i->user->role == 'użytkownik')
                                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-600 text-gray-100 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Użytkownik
                                                </span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <a href="mailto:{{$i->user->email}}" class="mt-2 inline-flex items-center gap-4 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $i->user->email }}
                                    </a>
                                </div>
                                <div class="flex flex-col w-full">
                                    <span class="my-2 inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Prośba o dołączenie
                                    </span>
                                    <div class="flex gap-2">
                                        <a href="{{route('team.invitation.accept',$i->user->id)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-green-500 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-600 active:bg-green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-check"></i>
                                        </a>
                                        <a href="{{route('team.invitation.reject',$i->user->id)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-ban"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>