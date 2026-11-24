import test from 'node:test';
import assert from 'node:assert/strict';
import { installSearchMemory, searchMemoryKey } from '../resources/js/search-memory.js';

function setup({ stored = 'Anna', query = '', failStorage = false } = {}) {
    const storage = new Map();
    const input = { id: 'search', name: '', value: '', events: [],
        matches: () => true, dispatchEvent(event) { this.events.push(event.type); } };
    const key = searchMemoryKey('1:2', '/dashboard/rcp/work-session', input);
    if (stored !== null) storage.set(key, stored);
    const listeners = {};
    globalThis.window = { location: { pathname: '/dashboard/rcp/work-session', search: query }, addEventListener() {} };
    globalThis.document = { readyState: 'complete', querySelector: () => ({ content: '1:2' }),
        querySelectorAll: () => [input], addEventListener: (name, callback) => { listeners[name] = callback; } };
    globalThis.localStorage = { getItem(key) { if (failStorage) throw Error(); return storage.get(key) ?? null; },
        setItem(key, value) { if (failStorage) throw Error(); storage.set(key, value); } };
    return { input, storage, key, listeners };
}

test('sidebar search is shared across tabs and isolated by account and company', () => {
    const input = { id: 'search' };
    const key = searchMemoryKey('1:2', '/rcp', input);
    assert.equal(key, searchMemoryKey('1:2', '/events', input));
    assert.equal(key, searchMemoryKey('1:2', '/objects', { name: 'search' }));
    assert.notEqual(key, searchMemoryKey('2:2', '/rcp', input));
    assert.notEqual(key, searchMemoryKey('1:3', '/rcp', input));
    assert.notEqual(key, searchMemoryKey('1:2', '/objects', { name: 'search', dataset: { searchScope: 'objects' } }));
});

test('a sidebar search prepared before page initialization is not reapplied on load', async () => {
    const state = setup();
    state.input.value = 'Anna';
    state.input.dataset = { searchBootstrapped: 'true' };
    installSearchMemory();
    await new Promise(resolve => setTimeout(resolve, 10));
    assert.deepEqual(state.input.events, []);
});

test('restoring a search triggers filtering and clearing it is remembered', async () => {
    const state = setup();
    installSearchMemory();
    await new Promise(resolve => setTimeout(resolve, 10));
    assert.equal(state.input.value, 'Anna');
    assert.deepEqual(state.input.events, ['input']);
    state.input.value = '';
    state.listeners.input({ target: state.input });
    assert.equal(state.storage.get(state.key), '');
});

test('explicit URL search wins over a remembered search', async () => {
    const state = setup({ query: '?search=Maria' });
    state.input.value = 'Maria';
    installSearchMemory();
    await new Promise(resolve => setTimeout(resolve, 10));
    assert.equal(state.storage.get(state.key), 'Maria');
    assert.deepEqual(state.input.events, []);
});

test('unavailable browser storage does not break search', async () => {
    const state = setup({ failStorage: true });
    installSearchMemory();
    await new Promise(resolve => setTimeout(resolve, 10));
    assert.doesNotThrow(() => state.listeners.input({ target: state.input }));
    assert.deepEqual(state.input.events, []);
});
