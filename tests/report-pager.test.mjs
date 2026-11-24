import test from 'node:test';
import assert from 'node:assert/strict';
import { createReportPager } from '../resources/js/report-pager.js';

test('a new month discards a pending old page even when abort is ignored', async () => {
    const requests = [], rows = [];
    const pager = createReportPager({
        fetchPage: (url, signal) => new Promise(resolve => requests.push({ url, signal, resolve })),
        onRows: batch => rows.push(...batch), onState() {},
    });
    pager.reset('/november?page=2');
    const old = pager.more();
    pager.reset('/december?page=2');
    const latest = pager.more();
    assert.equal(requests[0].signal.aborted, true);
    requests[1].resolve({ table: ['December'], next_page_url: null });
    await latest;
    requests[0].resolve({ table: ['November'], next_page_url: null });
    await old;
    assert.deepEqual(rows, ['December']);
});

test('empty filtered batches continue to a matching worker and failed pages can retry', async () => {
    const seen = [], rows = [], states = [];
    let fail = true;
    const pager = createReportPager({
        async fetchPage(url) {
            seen.push(url);
            if (url === '/2') return { table: [], next_page_url: '/3' };
            if (fail) { fail = false; throw new Error(); }
            return { table: ['Matching worker'], next_page_url: null };
        },
        onRows: batch => rows.push(...batch), onState: state => states.push(state),
    });
    pager.reset('/2');
    await pager.more();
    assert.ok(states.at(-1).error);
    await pager.more();
    assert.deepEqual(seen, ['/2', '/3', '/3']);
    assert.deepEqual(rows, ['Matching worker']);
    assert.equal(states.at(-1).next, null);
});
