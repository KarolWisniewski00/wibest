@props(['user'])
<dl class="grid min-w-0 grid-cols-1 gap-x-6 gap-y-4 text-left text-sm sm:grid-cols-2">
    <div class="min-w-0"><dt class="text-gray-500 dark:text-gray-400">📧 Email</dt><dd class="mt-1 break-all font-medium text-gray-900 dark:text-gray-100">{{ $user->email ?: 'Brak adresu email' }}</dd></div>
    <div><dt class="text-gray-500 dark:text-gray-400">📱 Telefon</dt><dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">{{ $user->phone ?: 'Brak telefonu' }}</dd></div>
</dl>
