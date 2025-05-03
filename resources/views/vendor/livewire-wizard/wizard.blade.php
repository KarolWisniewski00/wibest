<div>
    <form wire:submit="save">
        @include('livewire-wizard::steps-header')
        <x-errors class="mb-4 border-red-300 bg-gray-800 text-red-300 mx-6" />
        {{ $this->getCurrentStep() }}


        @include('livewire-wizard::steps-footer')
    </form>
</div>