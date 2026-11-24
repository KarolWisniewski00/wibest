<fieldset {{ $attributes->class(['space-y-2 p-2']) }}>
    <legend class="sr-only">Role</legend>
    <div class="space-y-2">
        <label class="group block cursor-pointer">
            <input type="checkbox" class="peer sr-only role-checkbox" value="admin">
            <span class="flex items-center justify-center rounded-full bg-gray-100 px-4 py-3 text-sm font-semibold uppercase tracking-widest text-gray-600 transition duration-200 group-hover:brightness-95 peer-checked:shadow-sm peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-green-500 dark:bg-gray-700 dark:text-gray-300 dark:group-hover:brightness-110 peer-checked:bg-green-300 peer-checked:text-gray-900 dark:peer-checked:bg-green-300 dark:peer-checked:text-gray-900">Admin</span>
        </label>
        <label class="group block cursor-pointer">
            <input type="checkbox" class="peer sr-only role-checkbox" value="kierownik">
            <span class="flex items-center justify-center rounded-full bg-gray-100 px-4 py-3 text-sm font-semibold uppercase tracking-widest text-gray-600 transition duration-200 group-hover:brightness-95 peer-checked:shadow-sm peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-green-500 dark:bg-gray-700 dark:text-gray-300 dark:group-hover:brightness-110 peer-checked:bg-yellow-300 peer-checked:text-gray-900 dark:peer-checked:bg-yellow-300 dark:peer-checked:text-gray-900">Kierownik</span>
        </label>
        <label class="group block cursor-pointer">
            <input type="checkbox" class="peer sr-only role-checkbox" value="użytkownik">
            <span class="flex items-center justify-center rounded-full bg-gray-100 px-4 py-3 text-sm font-semibold uppercase tracking-widest text-gray-600 transition duration-200 group-hover:brightness-95 peer-checked:shadow-sm peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-green-500 dark:bg-gray-700 dark:text-gray-300 dark:group-hover:brightness-110 peer-checked:bg-gray-300 peer-checked:text-gray-900 dark:peer-checked:bg-gray-300 dark:peer-checked:text-gray-900">Użytkownik</span>
        </label>
    </div>
</fieldset>
