<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <div class="p-4">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <!--HEADER-->
                    <x-container>
                        <x-h1-display>
                            Cześć, {{$user->name}}!
                        </x-h1-display>
                    </x-container>
                    <!--HEADER-->
                </div>
            </div>
        </div>
    </div>

    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>