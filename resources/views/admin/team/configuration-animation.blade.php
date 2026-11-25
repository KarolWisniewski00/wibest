<script>
(() => {
    const initialize = () => {
        document.querySelectorAll('details[data-animated-config]').forEach(details => {
            if (details.dataset.animationReady) return;
            details.dataset.animationReady = 'true';
            const summary = details.querySelector(':scope > summary');
            let animation = null;
            let expanded = details.open;
            const syncButtons = () => {
                if (!details.id) return;
                document.querySelectorAll('[aria-controls]').forEach(button => {
                    if (button.getAttribute('aria-controls') === details.id) {
                        button.setAttribute('aria-expanded', String(expanded));
                    }
                });
            };
            details.wibestToggle = () => {
                const from = details.getBoundingClientRect().height;
                expanded = !expanded;
                if (animation) {
                    animation.onfinish = null;
                    animation.cancel();
                    animation = null;
                }
                details.style.height = '';
                details.style.overflow = '';
                syncButtons();
                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !details.animate) {
                    details.open = expanded;
                    return;
                }
                details.open = expanded;
                const to = details.getBoundingClientRect().height;
                details.open = true;
                details.style.overflow = 'hidden';
                animation = details.animate(
                    [{ height: from + 'px' }, { height: to + 'px' }],
                    { duration: 300, easing: 'cubic-bezier(0.22, 1, 0.36, 1)' }
                );
                animation.onfinish = () => {
                    details.open = expanded;
                    details.style.height = '';
                    details.style.overflow = '';
                    animation = null;
                };
            };
            summary?.addEventListener('click', event => {
                event.preventDefault();
                details.wibestToggle();
            });
            details.addEventListener('toggle', () => {
                if (!animation) {
                    expanded = details.open;
                    syncButtons();
                }
            });
            syncButtons();
        });
    };
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initialize, { once: true });
    else initialize();
})();
</script>
