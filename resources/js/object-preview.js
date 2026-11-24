import { readFilterUrl, hideFilterUrl } from './filter-url.js';
export function normalizeEmployeeSearch(value) {
    return String(value ?? '').normalize('NFD').replace(/[\u0300-\u036f]/g, '')
        .toLocaleLowerCase('pl').replace(/ł/g, 'l').replace(/\s+/g, ' ').trim();
}

export function objectPreview({ endpoint, month, objectId, dashboard = false, selectedEmployeeId = null, deferred = false, startDate = null, endDate = null, initialFilters = {} }) {
    let controller;
    let version = 0;
    let appliedEmployeeId = selectedEmployeeId;
    const marker = dashboard ? 'X-Object-Dashboard' : 'X-Object-Preview';
    const sections = dashboard ? ['period', 'cards', 'objects', 'work'] : ['period', 'cards', 'workers', 'work'];
    return {
        month, selectedEmployeeId, employeeSearch: '', loading: deferred, reportLoading: deferred, error: '', pendingUrl: '', focusEmployeeId: null,
        init() {
            hideFilterUrl();
            if (deferred) this.$nextTick(() => {
                const url = new URL(endpoint, window.location.href);
                url.searchParams.set('start_date', startDate);
                url.searchParams.set('end_date', endDate);
                for (const [key, value] of Object.entries(initialFilters)) url.searchParams.set(key, value ?? '');
                this.changeMonth(url.href);
            });
        },
        changeRange({ start, end }) {
            const url = new URL(readFilterUrl());
            url.searchParams.delete('month');
            url.searchParams.set('start_date', start);
            url.searchParams.set('end_date', end);
            return this.changeMonth(url.href);
        },
        matchesEmployee(name) {
            return normalizeEmployeeSearch(name).includes(normalizeEmployeeSearch(this.employeeSearch));
        },
        hasMatchingEmployees() {
            return [...this.$refs.workers.querySelectorAll('[data-employee-name]')]
                .some(row => this.matchesEmployee(row.dataset.employeeName));
        },
        clearEmployeeSearch() {
            this.employeeSearch = '';
            this.$nextTick?.(() => this.$refs.workers.querySelector('[data-employee-search]')?.focus());
        },
        selectEmployee(id) {
            const clicked = id === null ? null : Number(id);
            this.focusEmployeeId = clicked ?? this.selectedEmployeeId;
            const selected = clicked === this.selectedEmployeeId ? null : clicked;
            this.selectedEmployeeId = selected;
            const url = new URL(this.loading ? this.pendingUrl : readFilterUrl());
            url.searchParams.set('month', this.loading ? new URL(this.pendingUrl).searchParams.get('month') : this.month);
            url.searchParams.delete('employee_id');
            if (selected !== null) url.searchParams.set('employee_id', String(selected));
            url.searchParams.set('work_category', 'all');
            return this.changeMonth(url.href, null, true);
        },
        async changeMonth(href, step = null, resetCategory = false) {
            const requested = new URL(href, window.location.href);
            const url = new URL(endpoint, window.location.href);
            url.search = requested.search;
            let employee = null;
            if (!dashboard) {
                employee = step !== null ? this.selectedEmployeeId
                    : (url.searchParams.has('employee_id') ? Number(url.searchParams.get('employee_id')) || null : this.selectedEmployeeId);
                url.searchParams.delete('employee_id');
                if (employee !== null) url.searchParams.set('employee_id', String(employee));
                this.selectedEmployeeId = employee;
            }
            // Capture even input/filter changes whose debounced request has not completed yet.
            for (const [section, keys] of (dashboard ? [['objects', ['search', 'status']], ['work', ['work_search', 'work_category']]] : [['work', ['work_search', 'work_category']]])) {
                for (const key of keys) {
                    if (resetCategory && key === 'work_category') continue;
                    const input = this.$refs[section]?.querySelector?.(`[name="${key}"]`);
                    if (input) {
                        url.searchParams.delete(key);
                        if (input.value) url.searchParams.set(key, input.value);
                    }
                }
            }
            if (this.loading && step !== null) {
                const pendingMonth = new URL(this.pendingUrl).searchParams.get('month');
                const date = new Date(`${pendingMonth}-01T12:00:00Z`);
                date.setUTCMonth(date.getUTCMonth() + Number(step));
                url.searchParams.set('month', date.toISOString().slice(0, 7));
            }
            url.searchParams.delete('work_page');
            url.searchParams.delete('history_page');
            if (dashboard) url.searchParams.delete('page');
            this.pendingUrl = url.href;
            const current = ++version;
            controller?.abort();
            controller = new AbortController();
            this.loading = true;
            this.reportLoading = true;
            this.error = '';
            this.$dispatch('wibest:object-month-changing', { objectId });
            try {
                const response = await fetch(url, {
                    credentials: 'same-origin', signal: controller.signal,
                    headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest', [marker]: '1' },
                });
                if (!response.ok || response.redirected || response.headers.get(marker) !== '1') throw new Error('response');
                const data = await response.json();
                if (current !== version) return;
                if ((!dashboard && !url.searchParams.has('start_date') && data.month !== url.searchParams.get('month')) || (dashboard && url.searchParams.has('start_date') && (data.startDate !== url.searchParams.get('start_date') || data.endDate !== url.searchParams.get('end_date'))) || (!dashboard && (!Array.isArray(data.readings) || (data.selectedEmployeeId ?? null) !== employee))
                    || sections.some(key => typeof data[key] !== 'string')) throw new Error('payload');
                // All monthly sections commit together, from one company-scoped report.
                this.month = data.month;
                if (!dashboard) appliedEmployeeId = this.selectedEmployeeId = employee;
                hideFilterUrl(url);
                for (const key of sections) {
                    if (this.$refs[key]) this.$refs[key].innerHTML = data[key];
                }
                this.$el.querySelectorAll('[data-object-status-history] a, [data-object-status-link]').forEach(link => {
                    const historyUrl = new URL(link.href);
                    if (dashboard) {
                        historyUrl.searchParams.set('start_date', data.startDate);
                        historyUrl.searchParams.set('end_date', data.endDate);
                    } else historyUrl.searchParams.set('month', data.month);
                    if (!dashboard) {
                        historyUrl.searchParams.delete('employee_id');
                        if (employee !== null) historyUrl.searchParams.set('employee_id', String(employee));
                    }
                    link.href = historyUrl.href;
                });
                if (!dashboard) {
                    // Alpine's $dispatch may be bound to the clicked worker/month element, which
                    // the HTML updates above have just detached. Send directly to the map's
                    // stable .window listener instead of relying on bubbling from that element.
                    window.dispatchEvent(new CustomEvent('wibest:object-readings', {
                        detail: { objectId, month: data.month, selectedEmployeeId: employee, readings: data.readings },
                    }));
                }
                if (!dashboard && this.focusEmployeeId !== null) {
                    this.$nextTick?.(() => this.$refs.workers.querySelector?.(`[data-employee-id="${this.focusEmployeeId}"]`)?.focus({ preventScroll: true }));
                }
            } catch (error) {
                if (current !== version || error.name === 'AbortError') return;
                if (!dashboard) this.selectedEmployeeId = appliedEmployeeId;
                this.error = 'Nie udało się odświeżyć danych. Pozostawiono poprzedni widok.';
            } finally {
                if (current === version) this.reportLoading = this.loading = false;
            }
        },
        destroy() { version++; controller?.abort(); this.reportLoading = this.loading = false; },
    };
}
