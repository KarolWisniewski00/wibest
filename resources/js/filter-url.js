// Keep request parameters available to cooperating widgets without exposing them
// in the address bar. History state belongs to this page's browser entry.
export function readFilterUrl() {
    const current = new URL(window.location.href);
    const remembered = window.history.state?.wibestFilterUrl;
    if (remembered && !current.search) {
        const url = new URL(remembered);
        if (url.pathname === current.pathname) return url.href;
    }
    return current.href;
}

export function hideFilterUrl(value = readFilterUrl()) {
    const url = new URL(value, window.location.href);
    const visible = new URL(window.location.href);
    visible.search = '';
    window.history.replaceState({ ...window.history.state, wibestFilterUrl: url.href }, '', visible.href);
}
