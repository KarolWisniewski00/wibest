<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-filter-date loader="pending">
            {{ route('api.v1.leave.pending.set.date') }}
        </x-filter-date>
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-leave.nav :role="$role" :leavePending="$leavePending" />
        <!--HEADER-->
        <x-leave.header-pending>
            <span>📋</span> Do rozpatrzenia
        </x-leave.header-pending>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
        </x-status-cello>
        <!--CONTENT-->
        <x-container-content>
            <!--MOBILE VIEW-->
            <x-list :items="$leaves" emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach ($leaves as $leave)
                <x-card-leave-pending :leave="$leave" />
                @endforeach
                <x-loader-leave-pending-card id="loader-card" />
            </x-list>
            <!--MOBILE VIEW-->

            <!--PC VIEW-->
            <x-table
                :headers="['Nazwa', 'Status', 'Ikona', 'Wniosek', 'Kiedy', 'Zrealizowano', 'Edycja', 'Akceptuj', 'Odrzuć']"
                :items="$leaves"
                :checkBox="false"
                emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach($leaves as $leave)
                <x-row-leave-pending :leave="$leave" />
                @endforeach
                <x-loader-leave-pending id="loader" />
            </x-table>
            <!--PC VIEW-->
            <x-loader-script>
                {{ route('api.v1.leave.pending.get') }}
            </x-loader-script>
            <script>
                $(document).ready(function() {
                    // Nasłuchujemy na zmianę (kliknięcie) na każdym elemencie z klasą 'toggle-status'
                    $('.toggle-status').on('change', function() {
                        var leaveId = $(this).data('leave-id'); // Pobieramy ID z atrybutu data-leave-id
                        var isChecked = $(this).is(':checked'); // Sprawdzamy nowy stan przełącznika

                        $.ajax({
                            url: '{{ route("leave.pending.toggle", "")}}/' + leaveId,
                            type: 'GET',
                            success: function(response) {
                                if (response.success) {
                                    if (response.new_status == true) {
                                        $('.is_used_'+ leaveId).addClass('hidden')
                                        $('.status_'+ leaveId).text('zrealizowane')
                                    } else {
                                        $('.is_used_'+ leaveId).removeClass('hidden')
                                        $('.status_'+ leaveId).text('zaakceptowane')
                                    }
                                    toastr.success('Status wniosku zmieniony');
                                    console.log('Status wniosku zmieniony');
                                    // Opcjonalnie: możesz wyświetlić komunikat dla użytkownika
                                } else {
                                    toastr.error('Błąd podczas zmiany statusu.');
                                    // Cofamy stan przełącznika, jeśli operacja się nie powiodła
                                    $(this).prop('checked', !isChecked);
                                }
                            },
                            error: function(xhr, status, error) {
                                toastr.error('Błąd podczas zmiany statusu.');
                                console.error(error);
                                // Cofamy stan przełącznika
                                $(this).prop('checked', !isChecked);
                                var $togglesToRevert = $('.sync-toggle[data-leave-id="' + id + '"]');
                                $togglesToRevert.prop('checked', !isChecked);
                            }
                        });
                    });
                    $('.sync-toggle').on('change', function() {
                        var leaveId = $(this).data('leave-id');
                        var newState = $(this).is(':checked');
                        var $relatedToggles = $('.sync-toggle[data-leave-id="' + leaveId + '"]');
                        $relatedToggles.prop('checked', newState);
                        sendToggleRequest(leaveId, newState);
                    });
                });
            </script>
        </x-container-content>
    </x-main>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>