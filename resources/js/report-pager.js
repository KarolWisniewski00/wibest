export function createReportPager({ fetchPage, onRows, onState }) {
    let revision = 0, controller, next = null, loading = false;
    const publish = (error = '') => onState({ next, loading, error });
    return {
        reset(url = null) {
            revision++;
            controller?.abort();
            next = url;
            loading = false;
            publish();
        },
        async more() {
            if (loading || !next) return;
            const current = revision;
            controller = new AbortController();
            loading = true;
            publish();
            try {
                // A filtered batch can be empty. Continue until a matching row
                // arrives or all candidates have been checked.
                do {
                    const data = await fetchPage(next, controller.signal);
                    if (current !== revision) return;
                    onRows(data.table);
                    next = data.next_page_url;
                    if (data.table.length) break;
                } while (next);
                loading = false;
                publish();
            } catch (error) {
                if (current !== revision || error.name === 'AbortError') return;
                loading = false;
                publish('Nie udało się pobrać danych. Spróbuj ponownie.');
            }
        },
    };
}
