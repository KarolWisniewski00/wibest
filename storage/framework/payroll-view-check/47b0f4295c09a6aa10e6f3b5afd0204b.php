<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
'filter_user_id' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
'filter_user_id' => '',
]); ?>
<?php foreach (array_filter(([
'filter_user_id' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
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
        let filter_user_id = `&filter_user_id=<?php echo e($filter_user_id ?? ''); ?>`;
        let rangeStart = null;
        let rangeEnd = null;

        if (filter_user_id == '&filter_user_id=') {
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
            $.get(`<?php echo e($slot); ?>?page=${page}${filter_user_id}&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`, function(data) {
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
                    $loader.addClass('hidden');
                    $loaderCard.addClass('hidden');
                }
            });
        }
        $('#max-h-js').on('scroll', function() {
            if ($('#max-h-js').scrollTop() + $('#max-h-js').height() >= $('#max-h-js').height() - 100) {
                loadMoreSessions();
            }
        });
        loadMoreSessions(); // wczytaj pierwszą stronę
    });
</script><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\loader-script-calendar.blade.php ENDPATH**/ ?>