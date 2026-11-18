<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <x-main-no-filter>
        <x-object.nav />
        <x-container-content-no-shadow>
            <form id="myForm" method="POST" action="{{ route('object.update', $object) }}" class="space-y-4">
                @csrf
                @method('PUT')
                @include('admin.object.partials.form-fields')
            </form>
        </x-container-content-no-shadow>
    </x-main-no-filter>
</x-app-layout>
