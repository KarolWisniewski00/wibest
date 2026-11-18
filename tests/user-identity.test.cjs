const { test } = require('node:test');
const assert = require('node:assert/strict');
const vm = require('node:vm');
const fs = require('node:fs');
let timers = [];
const context = vm.createContext({setTimeout: callback => {timers.push(callback); return timers.length;}, clearTimeout: id => {if(id) timers[id - 1] = null;}});
vm.runInContext(fs.readFileSync('public/js/user-identity.js', 'utf8'), context);
const identity = (check = async () => ({status: 'success', message: 'available'})) => context.wibestIdentity({}, check);
const input = (value, caret = value.length) => ({target: {value, selectionStart: caret, setSelectionRange(start) { this.selectionStart = start; }}});

test('CRM empty email is optional without availability requests; normal email stays required', () => {
    timers = [];
    const crm = context.wibestIdentity({}, () => { throw new Error('Unexpected check'); }, true);
    assert.equal(crm.emailMessage, 'Opcjonalnie \u2013 je\u015bli nie podasz adresu e-mail, system wygeneruje go automatycznie');
    crm.email = '   '; crm.emailChanged();
    assert.equal(crm.emailStatus, 'neutral');
    assert.equal(crm.emailMessage, 'Opcjonalnie \u2013 je\u015bli nie podasz adresu e-mail, system wygeneruje go automatycznie');
    assert.equal(timers.length, 0);
    crm.email = 'invalid'; crm.emailChanged();
    assert.equal(crm.emailStatus, 'error');
    const normal = identity(); normal.emailChanged();
    assert.equal(normal.emailMessage, 'Podaj adres e-mail.');
});

test('all pasted phone formats and editing canonical phone', () => {
    for (const phone of ['111222333', '111 222 333', '+48111222333', '+48 111 222 333', '48111222333', '0048111222333', '111-222-333']) {
        const state = identity(), event = input(phone);
        state.formatPhone(event);
        assert.equal(event.target.value, '+48 111 222 333');
        assert.equal(state.phoneValid, true);
    }
    const state = identity(), event = input('+48 191 222 333', 6);
    state.formatPhone(event);
    assert.equal(event.target.selectionStart, 6);
    state.formatPhone(input('+48 111 22'));
    assert.equal(state.phoneValid, false);
    state.formatPhone(input('+48 111 222 333'));
    assert.equal(state.phoneValid, true);
});

test('invalid and overlong phones remain visible without truncation', () => {
    for (const phone of ['1112223334', '+481112223334', '111abc222333', '111/222/333', '+49 111222333']) {
        const state = identity(), event = input(phone);
        state.formatPhone(event);
        assert.equal(event.target.value, phone);
        assert.equal(state.phoneValid, false);
    }
});

test('single word name is a suggestion, Unicode and compound names succeed', () => {
    const state = identity();
    state.name = 'Łukasz'; assert.equal(state.nameValid, false);
    state.name = 'Łukasz Żółć-Kowalski'; assert.equal(state.nameValid, true);
});

test('debounce prevents requests per character and stale results cannot show green', async () => {
    timers = [];
    const pending = [], checked = [];
    const state = identity(email => { checked.push(email); return new Promise(resolve => pending.push(resolve)); });
    state.email = 'j'; state.emailChanged();
    assert.equal(timers.length, 0);
    state.email = 'jan@firma.pl'; state.emailChanged();
    state.email = 'anna@firma.eu'; state.emailChanged();
    assert.equal(timers.filter(Boolean).length, 1);
    assert.equal(state.emailStatus, 'neutral');
    const first = timers.at(-1)();
    assert.deepEqual(checked, ['anna@firma.eu']);
    state.email = 'taken@firma.pl'; state.emailChanged();
    pending[0]({status: 'success', message: 'available'});
    await first;
    assert.equal(state.emailStatus, 'neutral');
    const second = timers.at(-1)();
    pending[1]({status: 'error', message: 'taken'});
    await second;
    assert.equal(state.emailStatus, 'error');
    assert.equal(state.emailMessage, 'taken');
});
