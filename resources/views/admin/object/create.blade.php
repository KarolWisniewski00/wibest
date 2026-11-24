<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <x-sidebar-left>
        <li>
            <div class="p-2 text-sm text-blue-700 rounded-lg dark:text-blue-300">
                Tworzysz nowy obiekt.
            </div>
        </li>
    </x-sidebar-left>
    <x-main>
        <x-object.nav />
        <x-container-content-no-shadow>
            <form id="myForm" method="POST" action="{{ route('object.store') }}" class="space-y-4">
                @csrf
                @include('admin.object.partials.form-fields')
            </form>
        </x-container-content-no-shadow>
    </x-main>
</x-app-layout>
