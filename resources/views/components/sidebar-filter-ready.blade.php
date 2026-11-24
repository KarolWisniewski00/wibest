<script>
                (() => {
                    const revealFilters = () => {
                        document.querySelectorAll('[data-rcp-filter-loading]').forEach(section => {
                            section.querySelectorAll('[data-rcp-filter-skeleton]').forEach(skeleton => skeleton.remove());
                            section.querySelectorAll('[data-rcp-filter-content]').forEach(content => content.style.removeProperty('display'));
                            section.querySelectorAll('[data-rcp-filter-input]').forEach(input => { input.disabled = false; });
                            section.setAttribute('aria-busy', 'false');
                        });
                    };
                    if (document.readyState === 'complete') revealFilters();
                    else window.addEventListener('load', revealFilters, { once: true });
                })();
            </script>
