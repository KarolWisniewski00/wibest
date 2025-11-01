<script>
    $(document).ready(function() {
        let page = 2;
        let loading = false;
        const $body = $('#body');
        const $list = $('#list');
        const $loader = $('#loader');

        function loadMoreSessions() {
            if (loading) return;
            loading = true;
            $loader.removeClass('hidden');

            $.get(`{{ $slot }}?page=${page}`, function(data) {
                data.table.forEach(function(row) {
                    $body.append(row);
                });
                data.list.forEach(function(row) {
                    $list.append(row);
                });

                if (data.next_page_url) {
                    page++;
                    loading = false;
                } else {
                    $(window).off('scroll'); // koniec danych
                }

                $loader.addClass('hidden');
            });
        }

        // Event scroll
        $(window).on('scroll', function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                loadMoreSessions();
            }
        });

        loadMoreSessions(); // wczytaj pierwszą stronę
    });
</script>