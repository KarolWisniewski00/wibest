import test from 'node:test';
import assert from 'node:assert/strict';
import { objectPreview, normalizeEmployeeSearch } from '../resources/js/object-preview.js';
import { groupReadings, objectMaps } from '../resources/js/object-maps.js';

function setup(dashboard = false) {
    const requests = [], events = [];
    globalThis.window = {
        location: { href: 'http://localhost/objects/show/4?month=2026-11&work_page=3&work_category=normal' },
        history: { state: {}, replaceState(state, title, url) { this.state = state; window.location.href = String(url); } },
        dispatchEvent(event) { events.push({ name: event.type, detail: event.detail }); return true; },
    };
    globalThis.fetch = (url, options) => new Promise(resolve => requests.push({ url, options, resolve }));
    const instance = objectPreview({ endpoint: dashboard ? 'http://localhost/objects/dashboard' : 'http://localhost/objects/show/4', month: '2026-11', objectId: 4, dashboard });
    instance.$refs = Object.fromEntries((dashboard ? ['period', 'cards', 'objects', 'work'] : ['period', 'cards', 'workers', 'work']).map(key => [key, { innerHTML: 'old' }]));
    instance.$dispatch = (name, detail) => events.push({ name, detail });
    const historyLink = { href: 'http://localhost/objects/show/4?month=2026-11&history_page=2' };
    instance.$el = { querySelectorAll: () => [historyLink] };
    return { instance, requests, events, historyLink };
}
function respond(request, month, dashboard = false) {
    const selectedEmployeeId = Number(request.url.searchParams.get('employee_id')) || null;
    const payload = { month, selectedEmployeeId, readings: [{ lat: 52, lng: 19, type: 'START', employeeId: selectedEmployeeId }] };
    for (const key of (dashboard ? ['period', 'cards', 'objects', 'work'] : ['period', 'cards', 'workers', 'work'])) payload[key] = `${key}:${month}${selectedEmployeeId ? ':' + selectedEmployeeId : ''}`;
    request.resolve({ ok: true, redirected: false, headers: new Headers({ [dashboard ? 'X-Object-Dashboard' : 'X-Object-Preview']: '1' }), json: async () => payload });
}

test('deferred dashboard starts with its server filters instead of an old employee search in history', async () => {
    const { requests } = setup(true);
    window.location.href = 'http://localhost/objects/dashboard';
    window.history.state = { wibestFilterUrl: 'http://localhost/objects/dashboard?search=anna' };
    const instance = objectPreview({ endpoint: window.location.href, dashboard: true, deferred: true,
        month: '2026-11', startDate: '2026-11-01', endDate: '2026-11-30', initialFilters: { search: '', status: '' } });
    instance.$refs = {};
    instance.$dispatch = () => {};
    instance.$nextTick = callback => callback();
    instance.init();
    assert.equal(requests.length, 1);
    assert.equal(requests[0].url.searchParams.get('search'), '');
    assert.equal(requests[0].url.searchParams.get('start_date'), '2026-11-01');
    requests[0].resolve({ ok: false });
    await new Promise(resolve => setTimeout(resolve, 0));
});

test('quick month changes commit all sections once and ignore the older response', async () => {
    const { instance, requests, events, historyLink } = setup();
    const old = instance.changeMonth('http://localhost/objects/show/4?month=2026-12&work_category=normal&work_page=3', 1);
    const latest = instance.changeMonth('http://localhost/objects/show/4?month=2026-12&work_category=normal&work_page=3', 1);
    assert.equal(requests[0].options.signal.aborted, true);
    assert.equal(instance.reportLoading, true);
    assert.equal(requests[1].url.searchParams.get('month'), '2027-01');
    assert.equal(requests[1].url.searchParams.has('work_page'), false);
    assert.equal(requests[1].url.searchParams.get('work_category'), 'normal');
    assert.equal(instance.$refs.cards.innerHTML, 'old');
    respond(requests[1], '2027-01');
    await latest;
    respond(requests[0], '2026-12');
    await old;
    for (const key of ['period', 'cards', 'workers', 'work']) assert.equal(instance.$refs[key].innerHTML, `${key}:2027-01`);
    assert.equal(instance.month, '2027-01');
    assert.equal(instance.loading, false);
    assert.equal(instance.reportLoading, false);
    assert.equal(new URL(window.history.state.wibestFilterUrl).searchParams.get('month'), '2027-01');
    assert.equal(new URL(historyLink.href).searchParams.get('month'), '2027-01');
    const updates = events.filter(event => event.name === 'wibest:object-readings');
    assert.equal(updates.length, 1);
    assert.equal(updates[0].detail.month, '2027-01');
    assert.equal(updates[0].detail.objectId, 4);
});

test('failed month request preserves the complete previous month', async () => {
    const { instance, requests, events } = setup();
    const pending = instance.changeMonth('http://localhost/objects/show/4?month=2026-10');
    requests[0].resolve({ ok: false });
    await pending;
    assert.equal(instance.month, '2026-11');
    assert.equal(instance.loading, false);
    assert.equal(instance.reportLoading, false);
    assert.ok(instance.error);
    for (const value of Object.values(instance.$refs)) assert.equal(value.innerHTML, 'old');
    assert.equal(events.some(event => event.name === 'wibest:object-readings'), false);
});

test('employee list search handles Polish characters, case and whitespace without changing view filters', () => {
    const { instance, requests, events } = setup();
    instance.$refs.workers.querySelectorAll = () => ['Jan Wiśniewski', 'Łukasz Żółkiewski'].map(employeeName => ({ dataset: { employeeName } }));
    const originalCards = instance.$refs.cards.innerHTML;
    const originalWork = instance.$refs.work.innerHTML;
    assert.equal(normalizeEmployeeSearch('  ZAŻÓŁĆ   GĘŚLĄ JAŹŃ '), 'zazolc gesla jazn');
    instance.employeeSearch = 'WISNIEWSKI';
    assert.equal(instance.matchesEmployee('Jan Wiśniewski'), true);
    assert.equal(instance.matchesEmployee('Łukasz Żółkiewski'), false);
    assert.equal(instance.hasMatchingEmployees(), true);
    instance.employeeSearch = 'lukasz';
    assert.equal(instance.matchesEmployee('ŁUKASZ ŻÓŁKIEWSKI'), true);
    instance.employeeSearch = 'zolkiewski';
    assert.equal(instance.matchesEmployee('Łukasz Żółkiewski'), true);
    instance.employeeSearch = 'nieistniejący';
    assert.equal(instance.hasMatchingEmployees(), false);
    assert.equal(instance.selectedEmployeeId, null);
    assert.equal(instance.month, '2026-11');
    assert.equal(instance.$refs.cards.innerHTML, originalCards);
    assert.equal(instance.$refs.work.innerHTML, originalWork);
    assert.equal(requests.length, 0);
    assert.equal(events.length, 0);
});

test('employee list search survives selection and month changes; clearing it keeps the active employee', async () => {
    const { instance, requests } = setup();
    let inputFocused = false;
    instance.$refs.workers.querySelectorAll = () => [{ dataset: { employeeName: 'Jan Wiśniewski' } }, { dataset: { employeeName: 'Adam Nowak' } }];
    instance.$refs.workers.querySelector = selector => selector === '[data-employee-search]' ? { focus() { inputFocused = true; } } : null;
    instance.$nextTick = callback => callback();
    instance.employeeSearch = 'wisniewski';
    assert.equal(instance.hasMatchingEmployees(), true);
    assert.equal(requests.length, 0);
    const selected = instance.selectEmployee(2);
    respond(requests[0], '2026-11');
    await selected;
    assert.equal(instance.selectedEmployeeId, 2);
    assert.equal(instance.employeeSearch, 'wisniewski');
    const month = instance.changeMonth('http://localhost/objects/show/4?month=2026-10', -1);
    assert.equal(requests[1].url.searchParams.has('employeeSearch'), false);
    respond(requests[1], '2026-10');
    await month;
    assert.equal(instance.employeeSearch, 'wisniewski');
    assert.equal(instance.hasMatchingEmployees(), true);
    assert.equal(instance.selectedEmployeeId, 2);
    const cards = instance.$refs.cards.innerHTML;
    const work = instance.$refs.work.innerHTML;
    instance.clearEmployeeSearch();
    assert.equal(instance.employeeSearch, '');
    assert.equal(instance.matchesEmployee('Adam Nowak'), true);
    assert.equal(instance.selectedEmployeeId, 2);
    assert.equal(instance.month, '2026-10');
    assert.equal(instance.$refs.cards.innerHTML, cards);
    assert.equal(instance.$refs.work.innerHTML, work);
    assert.equal(requests.length, 2);
    assert.equal(inputFocused, true);
});

test('employee selection toggles, changes, clears and survives month changes with one consistent response', async () => {
    const { instance, requests, events } = setup();
    const first = instance.selectEmployee(2);
    const second = instance.selectEmployee(1);
    assert.equal(instance.selectedEmployeeId, 1);
    assert.equal(requests[0].options.signal.aborted, true);
    assert.equal(requests[1].url.searchParams.get('employee_id'), '1');
    assert.equal(requests[1].url.searchParams.has('work_page'), false);
    respond(requests[1], '2026-11');
    await second;
    respond(requests[0], '2026-11');
    await first;
    assert.equal(instance.selectedEmployeeId, 1);
    for (const key of ['cards', 'work']) assert.equal(instance.$refs[key].innerHTML, `${key}:2026-11:1`);
    assert.equal(events.filter(event => event.name === 'wibest:object-readings').at(-1).detail.readings[0].employeeId, 1);
    const month = instance.changeMonth('http://localhost/objects/show/4?month=2026-10', -1);
    assert.equal(requests[2].url.searchParams.get('employee_id'), '1');
    respond(requests[2], '2026-10');
    await month;
    assert.equal(instance.month, '2026-10');
    assert.equal(instance.selectedEmployeeId, 1);
    const toggle = instance.selectEmployee(1);
    assert.equal(requests[3].url.searchParams.has('employee_id'), false);
    assert.equal(requests[3].url.searchParams.get('month'), '2026-10');
    respond(requests[3], '2026-10');
    await toggle;
    assert.equal(instance.selectedEmployeeId, null);
    assert.equal(instance.$refs.cards.innerHTML, 'cards:2026-10');
    const select = instance.selectEmployee(2);
    respond(requests[4], '2026-10');
    await select;
    const clear = instance.selectEmployee(null);
    assert.equal(requests[5].url.searchParams.has('employee_id'), false);
    respond(requests[5], '2026-10');
    await clear;
    assert.equal(instance.selectedEmployeeId, null);
    const rejected = instance.selectEmployee(1);
    requests[6].resolve({ ok: false });
    await rejected;
    assert.equal(instance.selectedEmployeeId, null);
    assert.equal(instance.$refs.cards.innerHTML, 'cards:2026-10');
    assert.ok(instance.error);
});

test('employee selection during a pending month request uses that month and ignores the old response', async () => {
    const { instance, requests } = setup();
    const pendingMonth = instance.changeMonth('http://localhost/objects/show/4?month=2026-12', 1);
    const selected = instance.selectEmployee(2);
    assert.equal(requests[1].url.searchParams.get('month'), '2026-12');
    assert.equal(requests[1].url.searchParams.get('employee_id'), '2');
    const nextMonth = instance.changeMonth('http://localhost/objects/show/4?month=2026-12', 1);
    assert.equal(requests[2].url.searchParams.get('month'), '2027-01');
    assert.equal(requests[2].url.searchParams.get('employee_id'), '2');
    respond(requests[2], '2027-01');
    await nextMonth;
    respond(requests[1], '2026-12');
    await selected;
    respond(requests[0], '2026-12');
    await pendingMonth;
    assert.equal(instance.month, '2027-01');
    assert.equal(instance.selectedEmployeeId, 2);
    assert.equal(instance.$refs.work.innerHTML, 'work:2027-01:2');
});

test('choosing or clearing an employee resets an old attention tab to all categories', async () => {
    const { instance, requests } = setup();
    window.location.href = 'http://localhost/objects/show/4?month=2026-11&work_category=attention&work_page=3';
    instance.$refs.work.querySelector = selector => ({ value: selector.includes('work_category') ? 'attention' : '' });
    const selected = instance.selectEmployee(2);
    assert.equal(requests[0].url.searchParams.get('employee_id'), '2');
    assert.equal(requests[0].url.searchParams.get('work_category'), 'all');
    assert.equal(requests[0].url.searchParams.has('work_page'), false);
    respond(requests[0], '2026-11');
    await selected;
    const cleared = instance.selectEmployee(2);
    assert.equal(requests[1].url.searchParams.get('work_category'), 'all');
    assert.equal(requests[1].url.searchParams.has('employee_id'), false);
    respond(requests[1], '2026-11');
    await cleared;
    assert.equal(instance.selectedEmployeeId, null);
});

test('map receives updates even when the Alpine dispatch element is detached by refreshed HTML', async () => {
    const { instance, requests, events } = setup();
    let connected = true;
    let workerHtml = 'old';
    Object.defineProperty(instance.$refs.workers, 'innerHTML', {
        get: () => workerHtml,
        set(value) { workerHtml = value; connected = false; },
    });
    // Model $dispatch bubbling from the worker/month element which initiated the request.
    instance.$dispatch = (name, detail) => { if (connected) events.push({ name, detail }); };
    const first = instance.selectEmployee(2);
    respond(requests[0], '2026-11');
    await first;
    assert.equal(connected, false);
    let updates = events.filter(event => event.name === 'wibest:object-readings');
    assert.equal(updates.length, 1);
    assert.equal(updates[0].detail.selectedEmployeeId, 2);
    assert.equal(updates[0].detail.readings[0].employeeId, 2);
    const second = instance.selectEmployee(1);
    respond(requests[1], '2026-11');
    await second;
    const clear = instance.selectEmployee(1);
    respond(requests[2], '2026-11');
    await clear;
    const month = instance.changeMonth('http://localhost/objects/show/4?month=2026-10', -1);
    respond(requests[3], '2026-10');
    await month;
    updates = events.filter(event => event.name === 'wibest:object-readings');
    assert.deepEqual(updates.map(event => event.detail.selectedEmployeeId), [2, 1, null, null]);
    assert.equal(updates[3].detail.month, '2026-10');
});

test('dashboard month change captures pending searches, resets both pages and commits only the newest month', async () => {
    const { instance, requests, events } = setup(true);
    instance.$refs.objects.querySelector = selector => ({ value: selector.includes('name="search"') ? 'Biuro' : 'paused' });
    instance.$refs.work.querySelector = selector => ({ value: selector.includes('work_search') ? 'Kowalski' : 'attention' });
    const old = instance.changeMonth('http://localhost/objects/dashboard?month=2026-12&page=3&work_page=4', 1);
    const latest = instance.changeMonth('http://localhost/objects/dashboard?month=2026-12&page=3&work_page=4', 1);
    assert.equal(requests.length, 2);
    assert.equal(requests[0].options.signal.aborted, true);
    assert.equal(requests[1].options.headers['X-Object-Dashboard'], '1');
    const params = requests[1].url.searchParams;
    assert.equal(params.get('month'), '2027-01');
    assert.equal(params.get('search'), 'Biuro');
    assert.equal(params.get('status'), 'paused');
    assert.equal(params.get('work_search'), 'Kowalski');
    assert.equal(params.get('work_category'), 'attention');
    assert.equal(params.has('page'), false);
    assert.equal(params.has('work_page'), false);
    respond(requests[1], '2027-01', true);
    await latest;
    respond(requests[0], '2026-12', true);
    await old;
    for (const key of ['period', 'cards', 'objects', 'work']) assert.equal(instance.$refs[key].innerHTML, `${key}:2027-01`);
    assert.equal(instance.month, '2027-01');
    assert.equal(events.some(event => event.name === 'wibest:object-readings'), false);
    assert.equal(new URL(window.history.state.wibestFilterUrl).searchParams.get('work_search'), 'Kowalski');
    const failed = instance.changeMonth('http://localhost/objects/dashboard?month=2027-02');
    requests[2].resolve({ ok: false });
    await failed;
    assert.equal(instance.month, '2027-01');
    for (const key of ['period', 'cards', 'objects', 'work']) assert.equal(instance.$refs[key].innerHTML, `${key}:2027-01`);
    assert.ok(instance.error);
    assert.equal(instance.loading, false);
});

test('readings group only identical positions of the same type and reject missing GPS', () => {
    const point = { lat: 0, lng: 0, type: 'START', employee: '<script>name</script>' };
    const groups = groupReadings([point, { ...point }, { ...point, type: 'STOP' }, { ...point, lat: null }, { ...point, lng: 190 }]);
    assert.equal(groups.length, 2);
    assert.equal(groups[0].length, 2);
    assert.equal(groups[1][0].type, 'STOP');
    assert.equal(groups[0][0].employee, '<script>name</script>');
});

test('map updates only reading overlays, preserving the map, radius and viewport', async () => {
    let mapCount = 0, circleCount = 0, fits = 0, popup;
    const buttons = [];
    const element = tag => ({
        tag, style: { setProperty() {} }, classList: { add() {} }, listeners: {}, children: [],
        setAttribute() {}, addEventListener(name, fn) { this.listeners[name] = fn; },
        removeEventListener() {}, append(...children) { this.children.push(...children); },
        appendChild(child) { this.children.push(child); }, remove() { this.removed = true; }, replaceChildren() {},
    });
    globalThis.document = { createElement(tag) { const node = element(tag); if (tag === 'button') buttons.push(node); return node; } };
    globalThis.ResizeObserver = class { observe() {} disconnect() {} };
    class Bounds { extend() { return this; } union() { return this; } }
    class Overlay {
        setMap(map) { this.map = map; if (map) { this.onAdd?.(); this.draw?.(); } else this.onRemove?.(); }
        getPanes() { return { overlayMouseTarget: element('pane') }; }
        getProjection() { return { fromLatLngToDivPixel: () => ({ x: 1, y: 2 }) }; }
        static preventMapHitsAndGesturesFrom() {}
    }
    globalThis.window = {
        __wibestMapsAuthHandler: true, addEventListener() {}, removeEventListener() {},
        google: { maps: {
            Map: class { constructor() { mapCount++; } fitBounds() { fits++; } addListener() { return { remove() {} }; } },
            InfoWindow: class { close() {} setContent(content) { popup = content; } setPosition() {} setOptions() {} open() {} },
            OverlayView: Overlay, LatLng: class {}, LatLngBounds: Bounds, Size: class {},
            Circle: class { constructor(options) { circleCount++; assert.equal(options.radius, 500); } getBounds() { return new Bounds(); } setMap() {} },
            event: { trigger() {}, clearInstanceListeners() {} },
        } },
    };
    const reading = { lat: 52, lng: 19, type: 'START', employee: '<b>Employee</b>', object: 'Site', time: '02.11.2026 08:00:00' };
    const component = objectMaps({ objects: [{ lat: 52, lng: 19, name: 'Site', radius: 500 }], readings: [reading, { ...reading, type: 'STOP' }] });
    component.$refs = { cardMap: element('map') };
    component.$watch = () => {};
    const google = window.google;
    delete window.google;
    let finishLoading;
    window.__wibestObjectMapsLoading = new Promise(resolve => { finishLoading = resolve; });
    component.init();
    // Filters can change while Google Maps is still loading. Initial Blade readings must not win.
    component.updateReadings([{ ...reading, employee: 'Selected employee' }, { ...reading, employee: 'Selected employee', type: 'STOP' }]);
    window.google = google;
    finishLoading(google.maps);
    await new Promise(resolve => setTimeout(resolve, 0));
    assert.equal(component.message, '');
    assert.equal(mapCount, 1);
    assert.equal(circleCount, 1);
    const previousFits = fits;
    const start = buttons.find(button => button.style.background === '#16a34a');
    const stop = buttons.find(button => button.style.background === '#dc2626');
    assert.ok(start);
    assert.ok(stop);
    start.listeners.click();
    assert.equal(popup.children[0].textContent, 'Selected employee');
    assert.equal(popup.children[1].textContent, 'START · 02.11.2026 08:00:00 · Site');
    component.updateReadings([{ ...reading, time: '01.12.2026 08:00:00' }]);
    assert.equal(start.removed, true);
    assert.equal(stop.removed, true);
    assert.notEqual(buttons[0].removed, true); // The object's primary marker stays on the map.
    assert.equal(mapCount, 1);
    assert.equal(circleCount, 1);
    assert.equal(fits, previousFits);
    component.updateReadings([]);
    assert.ok(component.readingsMessage);
    assert.equal(mapCount, 1);
    assert.equal(circleCount, 1);
    component.destroy();
});
