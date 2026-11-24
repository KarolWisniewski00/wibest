@props(['user'])
@if(($user->supervisor || $user->position) && $user->company && in_array($role, ['admin', 'właściciel']))
    <div {{ $attributes->class(['flex flex-col gap-3 md:flex-row md:flex-wrap md:justify-end']) }}>
        <x-button-link-blue href="{{ route('team.user.edit', $user) }}" class="w-full justify-center md:w-auto">
            <i class="fa-solid fa-pen-to-square mr-2" aria-hidden="true"></i>Edytuj użytkownika
        </x-button-link-blue>
        <x-button-link-orange href="{{ route('team.user.restart', $user) }}" class="w-full justify-center md:w-auto">
            <i class="fa-solid fa-paper-plane mr-2" aria-hidden="true"></i>Reset hasła
        </x-button-link-orange>
    </div>
@endif
