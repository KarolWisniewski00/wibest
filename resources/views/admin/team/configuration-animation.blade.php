<script>
(() => {
    const initialize = () => {
        document.querySelectorAll('details[data-animated-config]').forEach(details => {
            if (details.dataset.animationReady) return;
            details.dataset.animationReady = 'true';
            const summary = details.querySelector('summary');
            let animation = null;
            let expanded = details.open;
            summary.addEventListener('click', event => {
                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !details.animate) return;
                event.preventDefault();
                const from = details.getBoundingClientRect().height;
                expanded = !expanded;
                if (animation) {
                    animation.onfinish = null;
                    animation.cancel();
                }
                details.style.height = '';
                details.open = expanded;
                const to = details.getBoundingClientRect().height;
                // Keep content rendered throughout closing; commit the native state afterwards.
                details.open = true;
                details.style.overflow = 'hidden';
                animation = details.animate(
                    [{ height: from + 'px' }, { height: to + 'px' }],
                    { duration: 260, easing: 'cubic-bezier(0.22, 1, 0.36, 1)' }
                );
                animation.onfinish = () => {
                    details.open = expanded;
                    details.style.height = '';
                    details.style.overflow = '';
                    animation = null;
                };
            });
            details.addEventListener('toggle', () => {
                if (!animation) expanded = details.open;
            });
        });
    };
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initialize, { once: true });
    else initialize();
})();
</script>
