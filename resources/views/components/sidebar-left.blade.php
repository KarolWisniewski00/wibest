<aside id="sidebar-multi-level-sidebar" class="fixed mt-20 w-0 lg:w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-0 lg:px-2 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border-t-2 dark:border-gray-600 shadow">
        <ul class="space-y-2 font-medium">
            {{ $slot }}
        </ul>
    </div>
</aside>
<script>
    $(document).ready(function() {
        $('[data-collapse-toggle]').on('click', function() {
            var target = $(this).attr('aria-controls');
            $('#' + target).toggleClass('hidden');
            $(this).find('i').toggleClass('fa-chevron-up fa-chevron-down');
        });
    });
</script>