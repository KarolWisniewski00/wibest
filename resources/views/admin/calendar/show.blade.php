<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Zadanie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET TASK -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-900">
                    <a href="{{ route('calendar') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do kalendarza
                    </a>
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            {{ $event->title }}
                        </h1>
                        <a href="" class="mt-8 inline-flex items-center justify-center w-10 h-10 mr-2 text-blue-100 transition-colors duration-150 bg-blue-500 rounded-full focus:shadow-outline hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-600">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                    </div>
                    <div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 dark:hover:bg-gray-700 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Kolor zadania
                            </p>
                            <div class="grid mt-3 grid-cols-1 sm:grid-cols-11 gap-y-3 gap-x-2 sm:mt-2 2xl:mt-0">
                                <div class="relative flex">
                                    <div class="flex items-center gap-x-3 w-full cursor-pointer sm:block sm:space-y-1.5">
                                        <div class="h-10 w-10 rounded dark:ring-1 dark:ring-inset dark:ring-white/10 sm:w-full" style="background-color:{{ $event->color }}"></div>
                                        <div class="px-0.5">
                                            <div class="w-6 font-medium text-xs text-gray-900 2xl:w-full dark:text-gray-100">{{ $event->color }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 dark:hover:bg-gray-700 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data rozpoczęcia
                            </p>
                            <p class="text-gray-900 dark:text-gray-100">
                                {{ $event->start }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 dark:hover:bg-gray-700 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data zakończenia
                            </p>
                            <p class="text-gray-900 dark:text-gray-100">
                                {{ $event->end }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 dark:hover:bg-gray-700 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-gray-900 dark:text-gray-100">
                                {{ $event->user->name }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 dark:hover:bg-gray-700 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Status zdanaia
                            </p>
                            <p class="text-gray-900 dark:text-gray-100">
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 dark:hover:bg-gray-700 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data utworzenia zadania
                            </p>
                            <p class="text-gray-900 dark:text-gray-400">
                                {{ $event->created_at }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 dark:hover:bg-gray-700 md:space-y-0 space-y-1 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data aktualizacji zadania
                            </p>
                            <p class="text-gray-900 dark:text-gray-400">
                                {{ $event->updated_at }}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Opis
                        </h1>
                    </div>
                    <p class="text-lg text-gray-900 dark:text-gray-100">
                        {{ $event->description }}
                    </p>
                    <div class="mt-8 flex justify-end space-x-4">
                        <!-- Green button for marking as completed -->
                        <a href="" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            <i class="fa-solid fa-check mr-2"></i>Zakończone
                        </a>
                        <!-- Red button for deleting the event -->
                        <form action="" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć to zadanie?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </button>
                        </form>
                    </div>
                </div>
                <!-- END WIDGET TASK -->
            </div>
        </div>
    </div>
</x-app-layout>