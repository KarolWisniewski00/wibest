@props(['event'])
<li>
    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-4">
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start">
                    @if($event->event_type == 'stop')
                    <x-status-red>
                        Stop
                    </x-status-red>
                    @endif
                    @if($event->event_type == 'start')
                    <x-status-green>
                        Start
                    </x-status-green>
                    @endif
                </div>
            </div>
            <div class="text-start  text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xl">
                {{ $event->time }}
            </div>
            <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full  justify-start">
                <div class="flex items-center gap-4">
                    @if($event->user->profile_photo_url)
                    <img src="{{ $event->user->profile_photo_url }}" alt="{{ $event->user->name }}" class="w-10 h-10 rounded-full">
                    @else
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                        {{ strtoupper(substr($event->user->name, 0, 1)) }}
                    </div>
                    @endif
                    <div>
                        <div class="flex flex-col justify-center w-fit">
                            <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                {{$event->user->name}}
                            </x-paragraf-display>
                            @if($event->user->role == 'admin')
                            <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Admin
                            </span>
                            @elseif($event->user->role == 'menedżer')
                            <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Menedżer
                            </span>
                            @elseif($event->user->role == 'kierownik')
                            <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Kierownik
                            </span>
                            @elseif($event->user->role == 'użytkownik')
                            <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Użytkownik
                            </span>
                            @elseif($event->user->role == 'właściciel')
                            <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                Właściciel
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex space-x-4">
                <x-button-link-neutral href="{{route('rcp.event.show', $event)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
            </div>
        </div>
    </div>
</li>