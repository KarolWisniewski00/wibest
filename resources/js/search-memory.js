const selector = 'input#search, input[type="search"]';

export function searchMemoryKey(scope, path, input) {
    const field = input.id || input.name;
    if (input.dataset?.searchScope) return `wibest:search:${scope}:${path}:${input.dataset.searchScope}`;
    if (input.id === 'search' || input.name === 'search') return `wibest:search:${scope}:shared`;
    return field ? `wibest:search:${scope}:${path}:${field}` : null;
}

export function readSharedSearch(fallback = '') {
    if (typeof document === 'undefined') return fallback;
    const scope = document.querySelector('meta[name="search-memory-scope"]')?.content;
    if (!scope) return fallback;
    const params = new URLSearchParams(window.location.search);
    if (params.has('search')) return params.get('search');
    try { return localStorage.getItem(`wibest:search:${scope}:shared`) ?? fallback; } catch { return fallback; }
}

export function installSearchMemory() {
    const scope = document.querySelector('meta[name="search-memory-scope"]')?.content;
    if (!scope) return;
    const keyFor = input => searchMemoryKey(scope, window.location.pathname, input);
    const save = input => {
        const key = keyFor(input);
        if (!key) return;
        try { localStorage.setItem(key, input.value); } catch { /* Storage may be unavailable. */ }
    };
    document.addEventListener('input', event => {
        if (event.target.matches?.(selector)) save(event.target);
    }, true);
    if (window.jQuery) {
        const finishSearch = (event, xhr, settings) => {
            const expected = document.getElementById('search')?.value.trim();
            const url = new URL(settings.url, window.location.href);
            const params = new URLSearchParams(typeof settings.data === 'string' ? settings.data : settings.data || {});
            const search = params.get('search') ?? url.searchParams.get('search');
            if (search !== null && search.trim() === expected) document.documentElement.removeAttribute('data-search-pending');
        };
        window.jQuery(document).on('ajaxSuccess.searchMemory ajaxError.searchMemory', finishSearch);
    }

    const restore = () => {
        const params = new URLSearchParams(window.location.search);
        document.querySelectorAll(selector).forEach(input => {
            // Sidebar searches are restored in the HTML before any initial requests run.
            if (input.dataset?.searchBootstrapped) return;
            const key = keyFor(input);
            if (!key) return;
            // Explicit URL searches take precedence, including clearing the query.
            const parameter = input.name || (input.id === 'search' ? 'search' : null);
            if (parameter && params.has(parameter)) { save(input); return; }
            let remembered;
            try { remembered = localStorage.getItem(key); } catch { return; }
            if (remembered === null || remembered === input.value) return;
            input.value = remembered;
            // Let jQuery, Alpine and form handlers apply the restored search to the results.
            input.dispatchEvent(new Event('input', { bubbles: true }));
        });
    };
    // Restore after all page-specific search handlers have been attached.
    if (document.readyState === 'complete') setTimeout(restore, 0);
    else window.addEventListener('load', () => setTimeout(restore, 0), { once: true });
}
