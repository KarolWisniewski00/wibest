@props(['user', 'compact' => false])
<div class="flex min-w-0 items-start gap-4 text-left">
    <div class="shrink-0 rounded-2xl bg-green-100 p-2 dark:bg-gray-700"><x-user-photo :user="$user" /></div>
    <div class="min-w-0">@unless($compact)<p class="text-xs text-gray-500 dark:text-gray-400">Profil pracownika</p>@endunless<a data-team-link href="{{ route('team.user.show', $user) }}" class="mt-1 block break-words rounded-lg text-lg font-semibold text-gray-900 focus-visible:ring-2 focus-visible:ring-green-300 dark:text-gray-100">{{ $user->name }}</a>@unless($compact)<p class="mt-2 break-words text-sm text-gray-500 dark:text-gray-400">💼 {{ $user->position ?: 'Stanowisko nieuzupełnione' }}</p>@endunless<div class="mt-2"><x-user-role :user="$user" /></div></div>
</div>
