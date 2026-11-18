export function objectList({ endpoint, search = '', status = '', kind = 'objects' }) {
    const work = kind === 'work';
    const pageName = work ? 'work_page' : 'page';
    const marker = work ? 'X-Object-Work' : 'X-Object-List';
    const preservePeerFilters = url => {
        const currentUrl = new URL(window.location.href);
        for (const key of (work ? ['search', 'status', 'page'] : ['work_search', 'work_category', 'work_page'])) {
            url.searchParams.delete(key);
            if (currentUrl.searchParams.has(key)) url.searchParams.set(key, currentUrl.searchParams.get(key));
        }
    };
    let controller;
    let timer;
    let version = 0;
    const cancel = () => {
        clearTimeout(timer);
        timer = null;
        controller?.abort();
        version++;
    };
    return {
        search: search ?? '', status: status ?? '', loading: false, error: '', announcement: '', retryPage: 1,
        searchChanged(value) {
            this.search = value;
            // Invalidate an in-flight response immediately, before the debounce expires.
            cancel();
            this.loading = true;
            timer = setTimeout(() => this.load(1), 300);
        },
        selectStatus(value) {
            this.status = value;
            this.load(1);
        },
        paginate(event) {
            const link = event.target.closest(work ? '[data-work-pagination] a' : '[data-object-pagination] a');
            if (!link || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
            event.preventDefault();
            const page = timer ? 1 : Number(new URL(link.href).searchParams.get(pageName)) || 1;
            this.load(page);
        },
        async load(page = 1) {
            this.retryPage = page;
            cancel();
            const current = version;
            controller = new AbortController();
            const url = new URL(endpoint, window.location.href);
            preservePeerFilters(url);
            const searchName = work ? 'work_search' : 'search';
            const statusName = work ? 'work_category' : 'status';
            url.searchParams.delete(searchName);
            url.searchParams.delete(statusName);
            url.searchParams.delete(pageName);
            if (this.search) url.searchParams.set(searchName, this.search);
            if (this.status) url.searchParams.set(statusName, this.status);
            if (page > 1) url.searchParams.set(pageName, String(page));
            this.loading = true;
            this.error = '';
            try {
                const response = await fetch(url, {
                    signal: controller.signal,
                    credentials: 'same-origin',
                    headers: { 'Accept': 'text/html', 'X-Requested-With': 'XMLHttpRequest', [marker]: '1' },
                });
                if (!response.ok || response.redirected || response.headers.get(marker) !== '1') throw new Error('response');
                const html = await response.text();
                if (current !== version) return;
                this.$refs.results.innerHTML = html;
                this.announcement = this.$refs.results.querySelector('[data-object-list-summary]')?.textContent.trim() || '';
                // The other section may have completed its own request while this one was pending.
                preservePeerFilters(url);
                window.history.replaceState(window.history.state, '', url);
            } catch (error) {
                if (current !== version || error.name === 'AbortError') return;
                this.error = work ? 'Nie udało się odświeżyć czasu pracy.' : 'Nie udało się odświeżyć listy obiektów.';
            } finally {
                if (current === version) this.loading = false;
            }
        },
        destroy() { cancel(); this.loading = false; },
    };
}
