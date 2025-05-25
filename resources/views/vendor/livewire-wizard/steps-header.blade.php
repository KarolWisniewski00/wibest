<div class="w-full py-2">
    <div class="flex items-center justify-center">
        @foreach($stepInstances as $stepInstance)
            @include('livewire-wizard::step-header')
        @endforeach
    </div>
</div>
