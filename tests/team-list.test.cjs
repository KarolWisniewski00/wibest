const { test } = require('node:test');
const assert = require('node:assert/strict');
const fs = require('node:fs');
const vm = require('node:vm');

function setup() {
    const requests = [], handlers = new Map(), elements = new Map(), timers = new Map();
    let timerId = 0;
    const window = {innerHeight: 800, getSelection: () => '', open: (...args) => window.opened = args};
    const document = {documentElement: {scrollHeight: 2000}};
    const state = {roles: [], search: ''};
    function $(selector) {
        if (typeof selector === 'function') { selector(); return; }
        if (selector?.interactive !== undefined) return {closest: () => ({length: selector.interactive ? 1 : 0})};
        if (selector === '.role-checkbox:checked') return {map: () => ({get: () => [...state.roles]})};
        if (!elements.has(selector)) elements.set(selector, {
            html: '', textValue: '',
            classes: new Set(['hidden']),
            addClass(name) { this.classes.add(name); return this; },
            removeClass(name) { this.classes.delete(name); return this; },
            on(event, ...args) { handlers.set(String(selector === window ? 'window' : selector === document ? 'document' : selector) + ':' + event, args.at(-1)); return this; },
            val: () => state.search,
            text(text) { this.textValue = text; return this; },
            remove() { this.html = ''; return this; },
            empty() { this.html = ''; return this; }, append(html) { this.html += html; return this; },
            scrollTop: () => 1300, height: () => selector === document ? 2000 : 800,
        });
        return elements.get(selector);
    }
    $.get = (url, data) => {
        const request = {url, data, done(fn) {this.success = fn; return this;}, fail(fn) {this.failure = fn; return this;}, always(fn) {this.finish = fn; return this;}, abort() {this.aborted = true; this.failure?.(null, 'abort'); this.finish?.();}};
        requests.push(request); return request;
    };
    const code = fs.readFileSync('resources/views/components/filter-team-script.blade.php', 'utf8')
        .replace(/@json\(view\([^\n]+/g, "'' );")
        .replace(/<\/?script>/g, '').replace("@json(route('api.v1.team.user.get'))", "'/api/team'");
    vm.runInNewContext(code, {$, window, document, setTimeout: fn => {timers.set(++timerId, fn); return timerId;}, clearTimeout: id => timers.delete(id)});
    return {state, requests, handlers, elements, window, flush() { const pending = [...timers.values()]; timers.clear(); pending.forEach(fn => fn()); }};
}
const respond = (r, label, more = false) => { r.success({table: [label], list: [label], count: 1, next_page_url: more ? '/next' : null}); r.finish(); };


test('search debounces, combines roles, resets pagination and rejects stale responses', () => {
    const s = setup(); respond(s.requests[0], 'initial', true);
    s.state.roles = ['kierownik']; s.handlers.get('.role-checkbox:change')();
    s.state.search = 'J'; s.handlers.get('#search:input')();
    s.state.search = 'Jan'; s.handlers.get('#search:input')();
    assert.equal(s.requests.length, 2); s.flush();
    assert.equal(s.requests[1].aborted, true);
    assert.equal(s.requests[2].data.search, 'Jan');
    assert.deepEqual([...s.requests[2].data.role_filter], ['kierownik']);
    assert.equal(s.requests[2].data.page, 1);
    respond(s.requests[2], 'Jan manager'); respond(s.requests[1], 'stale');
    assert.equal(s.elements.get('#body').html, 'Jan manager');
    s.state.search = ''; s.handlers.get('#search:input')(); s.flush();
    assert.deepEqual([...s.requests[3].data.role_filter], ['kierownik']);
});

test('neutral row/card click opens profile; interactive elements and text selection do not', () => {
    const s = setup(); let clicks = 0, prevented = 0;
    const row = {querySelector: () => ({href: '/profile/7', click: () => clicks++})};
    const click = s.handlers.get('document:click.team auxclick.team');
    const event = {target: {interactive: false}, button: 0, preventDefault: () => prevented++};
    click.call(row, event); assert.equal(clicks, 1); assert.equal(prevented, 1);
    click.call(row, {...event, target: {interactive: true}}); assert.equal(clicks, 1);
    click.call(row, {...event, ctrlKey: true}); assert.equal(s.window.opened[0], '/profile/7');
    click.call(row, {...event, button: 1}); assert.equal(clicks, 1);
    s.window.getSelection = () => 'selected'; click.call(row, event); assert.equal(clicks, 1);
});

test('failed requests stop automatic loading until a filter changes', () => {
    const s = setup(); s.requests[0].failure(null, 'error'); s.requests[0].finish();
    s.handlers.get('window:scroll.team')(); assert.equal(s.requests.length, 1);
    s.handlers.get('.role-checkbox:change')(); assert.equal(s.requests.length, 2);
});
