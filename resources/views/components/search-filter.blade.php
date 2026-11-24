<li>
    <input {{ $attributes->merge(['id' => 'search', 'value' => request('search', ''), 'placeholder' => 'Szukaj', 'type' => 'text', 'aria-label' => 'Szukaj', 'class' => 'rounded-lg border-gray-300 datepicker h-12 w-full appearance-none rounded-lg border border-gray-100 dark:border-gray-700 bg-white pr-4 outline-none dark:bg-gray-700 dark:text-gray-50 dark:focus:border-2 dark:focus:border-blue-500']) }} />
    <script>
        (() => {
            const input = document.getElementById(@js($attributes->get('id', 'search')));
            if (!input || input.id !== 'search') return;
            const key = @js('wibest:search:'.auth()->id().':'.auth()->user()?->company_id.':shared');
            const explicit = @js(request()->has('search'));
            let restored = false;
            try {
                if (explicit) localStorage.setItem(key, input.value);
                else {
                    let value = localStorage.getItem(key);
                    if (value === null) {
                        value = localStorage.getItem(key.replace(/:shared$/, ':' + window.location.pathname + ':search'));
                        if (value !== null) localStorage.setItem(key, value);
                    }
                    if (value !== null && value !== input.value) { input.value = value; restored = true; }
                }
            } catch {}
            input.dataset.searchBootstrapped = 'true';
            if (@js($attributes->has('form'))) {
                if (restored) $(function () { input.dispatchEvent(new Event('input', { bubbles: true })); });
            } else if (input.value.trim()) document.documentElement.setAttribute('data-search-pending', '');
        })();
    </script>
</li>

