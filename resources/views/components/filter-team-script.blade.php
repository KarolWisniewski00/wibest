<script>
    $(document).ready(function() {
        const $body = $('#body');
        const $list = $('#list');
        $('.role-checkbox').on('change', function() {
            let roles = $('.role-checkbox:checked').map(function() {
                return $(this).val();
            }).get();
            console.log('Zaznaczone role:', roles);
            $('#show-filter').html(roles.length > 0 ? roles.join(', ') : 'WSZYSTKO');
            if (roles.length > 0) {} else {
                roles = ['admin', 'menedżer', 'kierownik', 'użytkownik', 'właściciel'];
            }
            $.ajax({
                url: `{{ $slot }}`,
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    role_filter: roles
                },
                success: function(data) {
                    $body.empty();
                    $list.empty();
                    data.table.forEach(function(row) {
                        $body.append(row);
                    });
                    data.list.forEach(function(row) {
                        $list.append(row);
                    });

                    $(window).off('scroll');
                },
                error: function(xhr) {
                    console.error('Błąd:', xhr.responseText);
                }
            });
        });
    });
</script>