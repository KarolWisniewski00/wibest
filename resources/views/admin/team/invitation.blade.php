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
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Zaproszenia</span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                    <ul id="pracownicy-dropdown" class="">
                        <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <label class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700 peer">
                                <input type="radio" name="workers" class="hidden peer" checked />
                                <span class="flex whitespace-nowrap peer-checked:bg-green-300 peer-checked:text-gray-900 peer-checked:rounded-lg w-full h-full px-3">Wszystkie</span>
                            </label>
                        </li>
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
                    <!--NAV-->
                    <div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                            <x-nav-link class="h-full text-center"
                                href="{{ route('team') }}"
                                :active="Str::startsWith(request()->path(), 'dashboard/team')">
                                Zespół
                            </x-nav-link>
                            @if($role == 'admin')
                            <x-nav-link class="h-full text-center"
                                href="{{ route('invitation') }}"
                                :active="Str::startsWith(request()->path(), 'dashboard/invitation')">
                                Zaproszenia
                                @if($invitationCount > 0)
                                    <span class="ml-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                        {{ $invitationCount }}
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
                            <x-label-green>
                                Wszystkie
                            </x-label-green>
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
                                            <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                                {{ $i->user->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <a href="mailto:{{ $i->user->email }}" class="my-4 inline-flex items-center text-blue-300 dark:text-blue-300 font-semibold text-xs uppercase tracking-widest hover:text-blue-700 dark:hover:text-blue-300 transition ease-in-out duration-150">
                                        {{ $i->user->email }}
                                    </a>
                                </div>
                                <div class="flex flex-col w-full">
                                    <span class="my-2 inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Prośba o dołączenie
                                    </span>
                                    <div class="flex gap-2">
                                        <a href="{{route('setting.user.invitations.accept',$i->user->id)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-green-500 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-600 active:bg-green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-check"></i>
                                        </a>
                                        <a href="{{route('setting.user.invitations.reject',$i->user->id)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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