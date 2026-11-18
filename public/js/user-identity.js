function wibestIdentity(initial, checkEmail, optionalEmail = false) {
    return {
        name: initial.name || '', email: initial.email || '', phone: initial.phone || '',
        emailStatus: 'neutral', emailMessage: optionalEmail ? 'Opcjonalnie \u2013 je\u015bli nie podasz adresu e-mail, system wygeneruje go automatycznie' : 'Podaj adres e-mail.', timer: null, revision: 0,
        init() { if (this.email) this.emailChanged(); },
        get nameMessage() {
            return this.name.trim().split(/\s+/u).filter(Boolean).length >= 2
                ? '✓ Podano imię i nazwisko.' : 'Zalecamy podanie imienia i nazwiska (minimum 2 słowa).';
        },
        get nameValid() { return this.name.trim().split(/\s+/u).filter(Boolean).length >= 2; },
        normalizeName(event) { this.name = this.name.trim().replace(/\s+/gu, ' '); event.target.value = this.name; event.target.dispatchEvent(new Event('input', {bubbles: true})); },
        phoneDigits(value) {
            let digits = value.replace(/\D/g, '');
            if (/^\s*0048/.test(value)) digits = digits.slice(4);
            else if (/^\s*\+48/.test(value) || (digits.length === 11 && digits.startsWith('48'))) digits = digits.slice(2);
            return digits;
        },
        get phoneValid() { return /^(?:\+48|0048)?[\d\s-]+$/.test(this.phone) && this.phoneDigits(this.phone).length === 9; },
        get phoneMessage() {
            if (!this.phone) return 'Podaj 9-cyfrowy numer telefonu.';
            if (!/^(?:\+48|0048)?[\d\s-]+$/.test(this.phone)) return 'Numer telefonu zawiera nieprawidłowe znaki.';
            const count = this.phoneDigits(this.phone).length;
            return count > 9 ? 'Numer telefonu zawiera zbyt wiele cyfr.' : count === 9 ? '✓ Numer telefonu jest poprawny.' : 'Numer telefonu powinien zawierać 9 cyfr.';
        },
        formatPhone(event) {
            const input = event.target, raw = input.value, caret = input.selectionStart;
            this.phone = raw;
            if (!raw || !/^(?:\+48|0048)?[\d\s-]+$/.test(raw)) return;
            const digits = this.phoneDigits(raw);
            if (digits.length > 9) return;
            const before = this.phoneDigits(raw.slice(0, caret)).length;
            const formatted = '+48 ' + (digits.match(/.{1,3}/g) || []).join(' ');
            this.phone = input.value = formatted;
            let position = 4, seen = 0;
            while (position < formatted.length && seen < before) { if (/\d/.test(formatted[position])) seen++; position++; }
            if (caret === raw.length) position = formatted.length;
            input.setSelectionRange(position, position);
        },
        emailChanged() {
            clearTimeout(this.timer);
            const revision = ++this.revision;
            this.emailStatus = 'neutral';
            const email = this.email.trim().toLowerCase();
            if (!email) { this.emailMessage = optionalEmail ? 'Opcjonalnie \u2013 je\u015bli nie podasz adresu e-mail, system wygeneruje go automatycznie' : 'Podaj adres e-mail.'; return; }
            if (!/^[^\s@]+@(?:[\p{L}0-9](?:[\p{L}0-9-]*[\p{L}0-9])?\.)+(?:[\p{L}]{2,}|xn--[A-Za-z0-9-]+)$/u.test(email)) {
                this.emailStatus = 'error'; this.emailMessage = 'Wpisz poprawny adres e-mail, np. jan@firma.pl.'; return;
            }
            this.emailMessage = 'Sprawdzanie dostępności adresu...';
            this.timer = setTimeout(async () => {
                try {
                    const result = await checkEmail(email);
                    if (revision !== this.revision) return;
                    this.emailStatus = result.status; this.emailMessage = result.message;
                } catch (error) {
                    if (revision !== this.revision) return;
                    this.emailStatus = 'error'; this.emailMessage = 'Nie udało się sprawdzić adresu. Spróbuj ponownie.';
                }
            }, 500);
        },
        destroy() { clearTimeout(this.timer); this.revision++; }
    };
}
