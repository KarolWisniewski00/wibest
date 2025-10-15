<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="px-6 lg:px-8 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                        <x-nav-link class="h-full text-center" href="{{ route('project') }}" :active="request()->routeIs('project')">
                            Wszystko
                        </x-nav-link>
                    </nav>
                </div>
                <div class="px-6 lg:px-8 pb-6 lg:pb-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <style>
                        .sticky {
                            position: fixed;
                            top: 0;
                            width: 100%;
                            z-index: 1000;
                            padding-right: 48px;
                        }

                        @media (min-width: 640px) {
                            .sticky {
                                padding-right: 96px;
                            }
                        }

                        @media (min-width: 1024px) {
                            .sticky {
                                padding-right: 128px;
                            }
                        }

                        @media (min-width: 1280px) {
                            .sticky {
                                position: relative;
                                padding-right: 0px;
                            }
                        }
                    </style>
                    <div id="space" class="xl:hidden"></div>

                    <!-- Napis z przyciskiem tworzenia -->
                    <div id="fixed" class="pb-4 flex flex-col justify-between items-center">
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Projekty
                            </h1>
                            <a href="{{ route('project.refresh') }}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-rotate mr-2"></i>Odśwież status
                            </a>
                        </div>

                    </div>
                    <script>
                        $(document).ready(function() {
                            var element = $('#fixed');
                            var space = $('#space');
                            var elementOffset = element.offset().top;
                            var elementHeight = element.outerHeight(); // Pobieranie wysokości elementu

                            $(window).scroll(function() {
                                if ($(window).scrollTop() > elementOffset) {
                                    element.addClass('sticky');
                                    space.height(elementHeight); // Dodawanie wysokości do space
                                } else {
                                    element.removeClass('sticky');
                                    space.height(0); // Usuwanie wysokości z space
                                }
                            });
                        });
                    </script>
                    <!-- Napis z przyciskiem tworzenia -->


                    <div class="relative overflow-x-auto sm:rounded-lg mt-8">
                        @if ($company)
                        <!--BODY-->
                        <div class="mt-8 grid grid-cols-3 md:gap-4">
                            @if ($projects->isEmpty())
                            <div class="col-span-3 flex justify-center items-center">
                                <x-empty-place class="w-full h-full" />
                            </div>
                            @else
                            @foreach($projects as $project)
                            <x-container-gray class="px-0">
                                <!--NAZWA-->
                                <x-text-cell class="mx-4">
                                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                                        Nazwa
                                    </p>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                        <x-label-link-project href="{{route('project.show', $project->id)}}">
                                            {{ $project->name }}
                                        </x-label-link-project>
                                    </p>
                                </x-text-cell>
                                <!--NAZWA-->

                                <x-project-status-link :project="$project" />

                                <!--Domena-->
                                <x-text-cell class="mx-4 break-all">
                                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                                        Domena
                                    </p>
                                    @if($project->production_domain == ' ')
                                    <x-label-link href="{{ $project->sandbox_domain }}">
                                        {{ $project->sandbox_domain }}
                                    </x-label-link>
                                    @elseif($project->production_domain == null)
                                    <x-label-link href="{{ $project->sandbox_domain }}">
                                        {{ $project->sandbox_domain }}
                                    </x-label-link>
                                    @else
                                    <x-label-link href="{{ $project->production_domain }}">
                                        {{ $project->production_domain }}
                                    </x-label-link>
                                    @endif
                                </x-text-cell>
                                <!--Domena-->

                                <!--Podgląd-->
                                <x-text-cell class="mx-4">
                                    <x-button-link-neutral href="{{route('project.show', $project)}}">
                                        <i class="fa-solid fa-eye mr-2"></i>Podgląd
                                    </x-button-link-neutral>
                                </x-text-cell>
                                <!--Podgląd-->
                            </x-container-gray>
                            @endforeach
                            @endif
                        </div>
                        <!--BODY-->

                        <!-- Paginacja -->
                        <div class="md:px-2 py-4">
                            {{ $projects->links('pagination::tailwind') }}
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
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
</x-app-layout>