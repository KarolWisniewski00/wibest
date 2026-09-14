<!-- Overlay -->
<div id="sidebar-overlay"
    class="fixed inset-0 bg-black/50 opacity-0 invisible transition-opacity duration-300 lg:hidden"
    style="z-index: 140;">
</div>
<aside id="sidebar-multi-level-sidebar" class="fixed top-20 left-0 w-64 h-[calc(100vh-80px)] 
              transition-transform duration-300 ease-in-out 
              -translate-x-full lg:translate-x-0" aria-label="Sidebar" style="z-index: 150;">
    <div class="h-full px-2 py-4 overflow-y-auto bg-white dark:bg-gray-800 dark:border-t-2 dark:border-gray-600 shadow">
        <ul class="space-y-2 font-medium">
            {{ $slot }}
        </ul>
    </div>
    <button id="sidebar-toggle-btn" aria-controls="sidebar-multi-level-sidebar"
        data-collapse-toggle-sidebar="sidebar-multi-level-sidebar" type="button"
        class="absolute bg-gray-800 text-white dark:bg-gray-200 top-1/2 left-[227px] p-2 text-gray-500 rounded-r-lg lg:hidden dark:text-gray-900 transform -translate-y-1/2 translate-x-full">

        <i class="fas fa-chevron-right text-xl"></i>

    </button>
</aside>
<script>
    $(document).ready(function () {
        $('[data-collapse-toggle]').on('click', function () {
            var target = $(this).attr('aria-controls');
            $('#' + target).toggleClass('hidden');
            $(this).find('i').toggleClass('fa-chevron-up fa-chevron-down');
        });
        var $sidebar = $('#sidebar-multi-level-sidebar');
        var $contentContainer = $('#content-container');
        var $overlay = $('#sidebar-overlay');

        $('[data-collapse-toggle-sidebar]').on('click', function () {

            var $button = $('#sidebar-toggle-btn');
            var $icon = $button.find('i');

            // Jeśli menu jest otwarte - zamknij je
            if ($overlay.hasClass('is-menu')) {
                $overlay
                    .removeClass('is-open is-menu')
                    .addClass('opacity-0 invisible');
                $('[data-collapse-toggle-menu]').trigger('click')
            }

            // Otwórz / zamknij sidebar
            $sidebar.toggleClass('-translate-x-full');
            $contentContainer.toggleClass('sidebar-open');

            // Sprawdź faktyczny stan sidebara
            var sidebarIsOpen = !$sidebar.hasClass('-translate-x-full');

            if (sidebarIsOpen) {

                // Ikona zamykania
                $icon
                    .removeClass('fa-chevron-right')
                    .addClass('fa-chevron-left');

                // Overlay dla sidebara
                $overlay
                    .removeClass('opacity-0 invisible is-menu')
                    .addClass('opacity-100 visible is-open is-sidebar');

            } else {

                // Ikona otwierania
                $icon
                    .removeClass('fa-chevron-left')
                    .addClass('fa-chevron-right');

                // Jeżeli nic innego nie jest otwarte
                $overlay
                    .removeClass('opacity-100 visible is-open is-sidebar')
                    .addClass('opacity-0 invisible');
            }
        });


        $('[data-collapse-toggle-menu]').on('click', function () {

            // Jeśli sidebar jest otwarty - zamknij go
            if ($overlay.hasClass('is-sidebar')) {

                $sidebar.addClass('-translate-x-full');
                $contentContainer.removeClass('sidebar-open');

                $('#sidebar-toggle-btn i')
                    .removeClass('fa-chevron-left')
                    .addClass('fa-chevron-right');
            }

            // Sprawdź czy menu jest aktualnie otwarte
            var menuIsOpen = $overlay.hasClass('is-menu');

            if (menuIsOpen) {

                // Zamknij menu
                $overlay
                    .removeClass('opacity-100 visible is-open is-menu')
                    .addClass('opacity-0 invisible');

            } else {

                // Otwórz menu
                $overlay
                    .removeClass('opacity-0 invisible is-sidebar')
                    .addClass('opacity-100 visible is-open is-menu');
            }
        });
        // Opcjonalnie: Ustawienie stanu ikony przy ładowaniu strony dla dużych ekranów
        if ($(window).width() >= 1024) {
            // Na dużym ekranie sidebar jest zawsze widoczny, więc powinna być strzałka w lewo (Zamknij)
            $('#sidebar-toggle-btn').find('i').removeClass('fa-chevron-right').addClass('fa-chevron-left');
        }
    });
</script>