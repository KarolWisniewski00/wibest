<aside id="sidebar-multi-level-sidebar"
    class="fixed top-20 left-0 w-64 h-[calc(100vh-80px)] 
              transition-transform duration-300 ease-in-out 
              -translate-x-full lg:translate-x-0"
    aria-label="Sidebar" style="z-index: 150;">
    <div class="h-full px-2 py-4 overflow-y-auto bg-white dark:bg-gray-800 dark:border-t-2 dark:border-gray-600 shadow">
        <ul class="space-y-2 font-medium">
            {{ $slot }}
        </ul>
    </div>
    <button id="sidebar-toggle-btn"
        aria-controls="sidebar-multi-level-sidebar"
        data-collapse-toggle-sidebar="sidebar-multi-level-sidebar"
        type="button"
        class="absolute bg-gray-800 text-white dark:bg-gray-200 top-1/2 left-[227px] p-2 text-gray-500 rounded-r-lg lg:hidden dark:text-gray-900 transform -translate-y-1/2 translate-x-full">

        <i class="fas fa-chevron-right text-xl"></i>

    </button>
</aside>
<script>
    $(document).ready(function() {
        $('[data-collapse-toggle]').on('click', function() {
            var target = $(this).attr('aria-controls');
            $('#' + target).toggleClass('hidden');
            $(this).find('i').toggleClass('fa-chevron-up fa-chevron-down');
        });
        var $sidebar = $('#sidebar-multi-level-sidebar');
        var $contentContainer = $('#content-container');

        $('[data-collapse-toggle-sidebar]').on('click', function() {
            var $button = $(this);

            // 1. Logika otwierania sidebara
            $sidebar.toggleClass('-translate-x-full');
            // Opcjonalnie: Przełączanie przesunięcia głównej treści
            $contentContainer.toggleClass('sidebar-open');

            // 2. Logika przełączania ikon Font Awesome
            var $icon = $button.find('i');

            // Sprawdzamy, czy sidebar jest teraz otwarty (klasa -translate-x-full została USUNIĘTA)
            var sidebarIsOpen = !$sidebar.hasClass('-translate-x-full');

            if (sidebarIsOpen) {
                // Sidebar jest OTWARTY: pokaż strzałkę w lewo (Zamknij)
                $icon.removeClass('fa-chevron-right').addClass('fa-chevron-left');
            } else {
                // Sidebar jest ZAMKNIĘTY: pokaż strzałkę w prawo (Otwórz)
                $icon.removeClass('fa-chevron-left').addClass('fa-chevron-right');
            }
        });

        // Opcjonalnie: Ustawienie stanu ikony przy ładowaniu strony dla dużych ekranów
        if ($(window).width() >= 1024) {
            // Na dużym ekranie sidebar jest zawsze widoczny, więc powinna być strzałka w lewo (Zamknij)
            $('#sidebar-toggle-btn').find('i').removeClass('fa-chevron-right').addClass('fa-chevron-left');
        }
    });
</script>