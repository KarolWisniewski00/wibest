<script>
    $(document).ready(function() {
        const $table = $('#table');
        const $masterCheckbox = $table.find('thead input[type="checkbox"]');
        const $label = $('#selected-count');

        function getCheckboxes() {
            return $table.find('tbody input[type="checkbox"]');
        }

        function updateSelectedCount() {
            const $checkboxes = getCheckboxes();
            const count = $checkboxes.filter(':checked').length;

            // Dopasowanie końcówki do liczby
            let suffix = 'ych';
            if (count === 1) suffix = 'y';
            else if (count >= 2 && count <= 4) suffix = 'e';

            $label.html(`${count} zaznaczon${suffix}`);
        }

        // Delegacja zdarzeń – działa też na przyszłe checkboxy
        $table.on('change', 'tbody input[type="checkbox"]', function() {
            updateSelectedCount();

            const $checkboxes = getCheckboxes();
            if (!$(this).prop('checked')) {
                $masterCheckbox.prop('checked', false);
            } else if ($checkboxes.length === $checkboxes.filter(':checked').length) {
                $masterCheckbox.prop('checked', true);
            }
        });

        // Master checkbox – zaznacz/odznacz wszystkie
        $masterCheckbox.on('change', function() {
            const isChecked = $(this).prop('checked');
            const $checkboxes = getCheckboxes();
            $checkboxes.prop('checked', isChecked);
            updateSelectedCount();
        });

        updateSelectedCount(); // W razie odświeżenia
    });
</script>