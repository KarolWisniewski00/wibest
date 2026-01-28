@props([
'filter_user_id' => '',
])
<script>
    $(document).ready(function() {
        let page = 2;
        let loading = false;
        const $body = $('#body');
        const $list = $('#list');
        const $loader = $('#loader');
        const $loaderCard = $('#loader-card');
        const startInputVal = $('#start_date').val();
        const endInputVal = $('#end_date').val();
        let filter_user_id = `&filter_user_id={{ $filter_user_id ?? '' }}`;
        let rangeStart = null;
        let rangeEnd = null;

        if(filter_user_id == '&filter_user_id='){
            filter_user_id = '';
        }

        function setRange(start, end) {
            rangeStart = start;
            rangeEnd = end;
        }

        if (startInputVal && endInputVal) {
            let start = new Date(startInputVal);
            let end = new Date(endInputVal);

            start.setHours(0, 0, 0, 0); //zmiana czasu letni/zimowy
            end.setHours(23, 59, 59, 999); //zmiana czasu letni/zimowy

            setRange(start, end);
        } else {
            // fallback na dzisiaj, jeśli inputy puste
            const today = new Date();
            setRange(today, today);
        }

        function formatDate(date) {
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const d = String(date.getDate()).padStart(2, '0');
            return `${y}-${m}-${d}`;
        }

        function loadMoreSessions() {
            if (loading) return;
            loading = true;
            $loader.removeClass('hidden');
            $loaderCard.removeClass('hidden');
            $.get(`{{ $slot }}?page=${page}${filter_user_id}&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`, function(data) {
                data.table.forEach(function(row) {
                    $loader.before(row);
                });
                data.list.forEach(function(row) {
                    $loaderCard.before(row);
                });

                if (data.next_page_url) {
                    page++;
                    loading = false;
                } else {
                    $(window).off('scroll'); // koniec danych
                }

                $loader.addClass('hidden');
                $loaderCard.addClass('hidden');
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