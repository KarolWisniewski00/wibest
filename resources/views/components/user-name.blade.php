<span class="flex flex-wrap items-center gap-2 text-start">
    {{ $user->name }}
    <x-user-role :user="$user" />
</span>