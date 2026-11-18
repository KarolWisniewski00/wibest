import test from 'node:test';
import assert from 'node:assert/strict';
import { objectList } from '../resources/js/object-list.js';

const sleep = ms => new Promise(resolve => setTimeout(resolve, ms));
function setup(kind = 'work') {
    const requests = [];
    globalThis.window = {
        location: { href: 'http://localhost/dashboard/objects/dashboard?month=2026-09&status=active&work_category=overtime&work_search=old&work_page=4' },
        history: { state: {}, replaceState(state, title, url) { window.location.href = String(url); } },
    };
    globalThis.fetch = (url, options) => new Promise(resolve => requests.push({ url, options, resolve }));
    const instance = objectList({ endpoint: 'http://localhost/dashboard/objects/dashboard?month=2026-09', kind, status: kind === 'work' ? 'overtime' : 'active', search: 'old' });
    instance.$refs = { results: { innerHTML: '', querySelector: () => ({ textContent: 'results' }) } };
    return { instance, requests };
}
function respond(request, html, marker = 'X-Object-Work') {
    request.resolve({ ok: true, redirected: false, headers: new Headers({ [marker]: '1' }), text: async () => html });
}

test('work search debounces, resets page, preserves filters and ignores stale responses', async () => {
    const { instance, requests } = setup();
    const original = instance.load(4);
    instance.searchChanged('A');
    instance.searchChanged('Anna');
    assert.equal(requests[0].options.signal.aborted, true);
    respond(requests[0], 'stale');
    await original;
    assert.equal(instance.$refs.results.innerHTML, '');
    assert.equal(requests.length, 1);
    await sleep(330);
    assert.equal(requests.length, 2);
    const url = requests[1].url;
    assert.equal(url.searchParams.get('work_search'), 'Anna');
    assert.equal(url.searchParams.get('work_category'), 'overtime');
    assert.equal(url.searchParams.get('month'), '2026-09');
    assert.equal(url.searchParams.get('status'), 'active');
    assert.equal(url.searchParams.has('work_page'), false);
    instance.searchChanged('An');
    await sleep(330);
    respond(requests[2], 'newest');
    await sleep(0);
    respond(requests[1], 'out of order');
    await sleep(0);
    assert.equal(instance.$refs.results.innerHTML, 'newest');
    instance.searchChanged('');
    await sleep(330);
    assert.equal(requests[3].url.searchParams.has('work_search'), false);
    respond(requests[3], 'cleared');
    await sleep(0);
    assert.equal(instance.$refs.results.innerHTML, 'cleared');
    instance.destroy();
});

test('work pagination and categories reuse the same loader', async () => {
    const { instance, requests } = setup();
    let prevented = false;
    instance.paginate({ button: 0, target: { closest: selector => selector === '[data-work-pagination] a' ? { href: 'http://localhost/?work_page=2' } : null }, preventDefault() { prevented = true; } });
    assert.equal(prevented, true);
    assert.equal(requests[0].url.searchParams.get('work_page'), '2');
    assert.equal(instance.retryPage, 2);
    assert.equal(instance.loading, true);
    assert.equal(requests[0].url.searchParams.get('work_search'), 'old');
    respond(requests[0], 'second page');
    await sleep(0);
    instance.selectStatus('attention');
    assert.equal(requests[1].url.searchParams.get('work_category'), 'attention');
    assert.equal(requests[1].url.searchParams.has('work_page'), false);
    respond(requests[1], 'attention');
    await sleep(0);
    assert.equal(instance.$refs.results.innerHTML, 'attention');
    instance.destroy();
});

test('object search retains existing header and current work table filters', async () => {
    const { instance, requests } = setup('objects');
    const pending = instance.load(2);
    assert.equal(requests[0].options.headers['X-Object-List'], '1');
    assert.equal(requests[0].url.searchParams.get('page'), '2');
    assert.equal(requests[0].url.searchParams.get('work_page'), '4');
    respond(requests[0], 'objects', 'X-Object-List');
    await pending;
    assert.equal(instance.$refs.results.innerHTML, 'objects');
    instance.destroy();
});

test('work table pagination and search retain the employee chosen in the preview endpoint', async () => {
    const { requests } = setup();
    const instance = objectList({ endpoint: 'http://localhost/objects/show/4?month=2026-11&employee_id=2', kind: 'work', search: 'Worker', status: 'attention' });
    instance.$refs = { results: { innerHTML: '', querySelector: () => null } };
    const pending = instance.load(2);
    assert.equal(requests[0].url.searchParams.get('employee_id'), '2');
    assert.equal(requests[0].url.searchParams.get('month'), '2026-11');
    assert.equal(requests[0].url.searchParams.get('work_page'), '2');
    assert.equal(requests[0].url.searchParams.get('work_category'), 'attention');
    assert.equal(requests[0].url.searchParams.get('work_search'), 'Worker');
    respond(requests[0], 'selected employee');
    await pending;
    assert.equal(instance.$refs.results.innerHTML, 'selected employee');
    instance.destroy();
});

test('object debounce and concurrent section responses preserve independent results and filters', async () => {
    const { instance: work, requests } = setup();
    const objects = objectList({ endpoint: 'http://localhost/dashboard/objects/dashboard?month=2026-09', search: '', status: 'active' });
    objects.$refs = { results: { innerHTML: '', querySelector: () => ({ textContent: 'objects' }) } };
    const pendingWork = work.load(2);
    objects.searchChanged('B');
    objects.searchChanged('Biuro');
    assert.equal(objects.loading, true);
    assert.equal(work.loading, true);
    assert.equal(requests.length, 1);
    await sleep(330);
    assert.equal(requests.length, 2);
    assert.equal(requests[1].url.searchParams.get('search'), 'Biuro');
    assert.equal(requests[1].url.searchParams.has('page'), false);
    assert.equal(requests[1].options.headers['X-Object-List'], '1');
    respond(requests[1], 'object results', 'X-Object-List');
    await sleep(0);
    assert.equal(objects.$refs.results.innerHTML, 'object results');
    assert.equal(work.$refs.results.innerHTML, '');
    respond(requests[0], 'work results');
    await pendingWork;
    const url = new URL(window.location.href);
    assert.equal(url.searchParams.get('search'), 'Biuro');
    assert.equal(url.searchParams.get('status'), 'active');
    assert.equal(url.searchParams.get('work_page'), '2');
    assert.equal(url.searchParams.get('work_category'), 'overtime');
    assert.equal(work.$refs.results.innerHTML, 'work results');
    assert.equal(objects.$refs.results.innerHTML, 'object results');
    const failed = work.load(3);
    requests[2].resolve({ ok: false });
    await failed;
    assert.equal(work.loading, false);
    assert.ok(work.error);
    assert.equal(objects.error, '');
    assert.equal(objects.$refs.results.innerHTML, 'object results');
    objects.destroy();
    work.destroy();
});
