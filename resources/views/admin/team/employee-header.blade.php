<header class="my-6 rounded-2xl bg-white p-6 sm:p-8 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <div class="flex flex-wrap items-start gap-5">
        <div class="shrink-0 rounded-2xl bg-green-100 p-3 dark:bg-gray-700"><x-user-photo :user="$user" /></div>
        <div class="min-w-0 flex-1"><p class="text-sm text-gray-500 dark:text-gray-400">Profil pracownika</p><h1 class="mt-1 break-words text-3xl font-semibold tracking-tight">{{ $user->name }}</h1>
            <div class="mt-3 flex flex-wrap items-center gap-3"><x-user-role :user="$user" /><span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->position ?: 'Stanowisko nieuzupełnione' }}</span></div>
        </div>
        <div class="ml-auto hidden md:block"><x-team-user-actions :user="$user" /></div>
    </div>
    <dl class="mt-7 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 text-sm">
        <div><dt class="text-gray-500 dark:text-gray-400">📧 Email</dt><dd class="mt-1 break-all">@if($user->email)<a href="mailto:{{ $user->email }}" class="hover:underline">{{ $user->email }}</a>@else Brak danych @endif</dd></div>
        <div><dt class="text-gray-500 dark:text-gray-400">📱 Telefon</dt><dd class="mt-1">@if($user->phone)<a href="tel:{{ $user->phone }}" class="hover:underline">{{ $user->phone }}</a>@else Brak danych @endif</dd></div>
        <div><dt class="text-gray-500 dark:text-gray-400">👤 Bezpośredni przełożony</dt><dd class="mt-1">{{ $user->supervisor?->name ?? 'Brak przełożonego' }}</dd></div>
        <div><dt class="text-gray-500 dark:text-gray-400">👤 Płeć</dt><dd class="mt-1">{{ match($user->gender) { 'male' => 'Mężczyzna', 'female' => 'Kobieta', default => 'Brak danych' } }}</dd></div>
        @if($user->oauth_id)<div><dt class="text-gray-500 dark:text-gray-400">Logowanie przez Google</dt><dd class="mt-1"><i class="fa-brands fa-google mr-2" aria-hidden="true"></i>Połączono</dd></div>@endif
    </dl>
    <div class="mt-6 md:hidden"><x-team-user-actions :user="$user" /></div>
</header>
