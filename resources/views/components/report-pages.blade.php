<script>
$(function () {
    const body = document.getElementById('body');
    const scroll = document.getElementById('max-h-js');
    let hasRows = false;
    let retryFirst = false;
    const loadingRows = @js(view(request()->routeIs('raport.time-smart.index') ? 'components.loader-calendar-smart' : 'components.loader-calendar', ['attributes' => new \Illuminate\View\ComponentAttributeBag(['data-report-loading' => '', 'role' => 'status', 'aria-label' => 'Ładowanie danych'])])->render());
    const clearLoading = () => body.querySelectorAll('[data-report-loading]').forEach(row => row.remove());
    const showLoading = () => {
        if (body.querySelector('[data-report-loading]')) return;
        body.insertAdjacentHTML('beforeend', loadingRows.repeat(3));
    };
    const showError = () => {
        clearLoading();
        body.querySelector('[data-report-error]')?.remove();
        body.insertAdjacentHTML('beforeend', '<tr data-report-error><td colspan="999" class="p-4 text-center text-gray-700 dark:text-gray-300" role="alert">Nie udało się pobrać danych. <button type="button" data-report-retry class="underline">Spróbuj ponownie</button></td></tr>');
    };
    const pager = window.wibestReportPager({
        async fetchPage(url, signal) {
            const response = await fetch(url, { signal, headers: { 'X-Requested-With': 'XMLHttpRequest', Accept: 'application/json' } });
            if (!response.ok) throw new Error('response');
            return response.json();
        },
        onRows(rows) {
            if (rows.length) hasRows = true;
            clearLoading();
            body.insertAdjacentHTML('beforeend', rows.join(''));
            showLoading();
        },
        onState({ next, loading, error }) {
            body.setAttribute('aria-busy', String(loading));
            if (loading) showLoading();
            else clearLoading();
            if (error) { showError(); return; }
            if (!next && !loading && !hasRows && !body.querySelector('td')) {
                body.innerHTML = '<tr><td colspan="999" class="p-6 text-center text-gray-500 dark:text-gray-300">Brak danych dla wybranych filtrów.</td></tr>';
            }
        },
    });
    window.addEventListener('wibest-filter-changing', () => { hasRows = false; retryFirst = false; pager.reset(); body.setAttribute('aria-busy', 'true'); });
    window.addEventListener('wibest-report-error', () => {
        retryFirst = true;
        body.innerHTML = '';
        body.setAttribute('aria-busy', 'false');
        showError();
    });
    window.addEventListener('wibest-report-loaded', event => {
        hasRows = !event.detail.empty;
        pager.reset(event.detail.next);
        if (!hasRows) pager.more();
    });
    body.addEventListener('click', event => {
        if (!event.target.closest('[data-report-retry]')) return;
        body.querySelector('[data-report-error]')?.remove();
        if (retryFirst) window.dispatchEvent(new Event('wibest-report-retry'));
        else pager.more();
    });
    let previousTop = scroll.scrollTop;
    scroll.addEventListener('scroll', () => {
        const movingDown = scroll.scrollTop > previousTop;
        previousTop = scroll.scrollTop;
        if (movingDown && scroll.scrollHeight - scroll.scrollTop <= scroll.clientHeight + 100) pager.more();
    }, { passive: true });
    let previousWindowTop = window.scrollY;
    window.addEventListener('scroll', () => {
        const movingDown = window.scrollY > previousWindowTop;
        previousWindowTop = window.scrollY;
        if (movingDown && scroll.getBoundingClientRect().bottom <= window.innerHeight + 100) pager.more();
    }, { passive: true });
    // Three compact rows can fit without a scrollbar. A deliberate downward
    // gesture must still be able to request the next batch.
    const loadAtEnd = () => {
        if (scroll.scrollHeight - scroll.scrollTop <= scroll.clientHeight + 100) pager.more();
    };
    scroll.addEventListener('wheel', event => { if (event.deltaY > 0) loadAtEnd(); }, { passive: true });
    let touchY = null;
    scroll.addEventListener('touchstart', event => { touchY = event.touches[0]?.clientY ?? null; }, { passive: true });
    scroll.addEventListener('touchmove', event => {
        const currentY = event.touches[0]?.clientY ?? null;
        if (touchY !== null && currentY !== null && currentY < touchY) loadAtEnd();
        touchY = currentY;
    }, { passive: true });
});
</script>
