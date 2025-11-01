<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />

        <!--CONTENT-->
        <x-container-content-form>

            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.client') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <x-header-form>
                <span>📋</span> Edytuj klienta
            </x-header-form>

            <!--FORMULARZ-->
            <form method="POST" action="{{ route('setting.client.update', $client) }}">
                @csrf
                @method('PUT')
                <!--NAZWA FIRMY-->
                <div class="mt-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🏢</span> Nazwa firmy
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $client->name) }}" autofocus required
                        class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <!--NAZWA FIRMY-->

                <!--ADRES-->
                <div class="mt-2">
                    <label for="adress" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>📍</span> Adres
                    </label>
                    <input type="text" id="adress" name="adress" value="{{ old('adress', $client->adress) }}" autofocus required
                        class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                    @error('adress')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <!--ADRES-->

                <!--NIP-->
                <div class="mt-2">
                    <label for="vat_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🧾</span> NIP
                    </label>
                    <input type="text" id="vat_number" name="vat_number" value="{{ old('vat_number', $client->vat_number) }}"
                        class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" required>
                    <x-button-orange id="fetch_vat_data" type="button" class="text-lg mt-2">
                        <i class="fa-solid fa-magnifying-glass mr-2"></i>Znajdź w GUS
                    </x-button-orange>
                    @error('vat_number')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <input type="hidden" id="api-link-gus" value="{{route('api.v1.search.gus',[''])}}">
                <script>
                    $(document).ready(function() {
                        $('#fetch_vat_data').click(function() {
                            let apiLinkGus = $('#api-link-gus');
                            var nip = $('#vat_number').val();

                            if (nip) {
                                $.ajax({
                                    url: apiLinkGus.val() + '/' + nip,
                                    method: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        console.log('Dane podatnika VAT:', data['response']);
                                        $('#name').val(data['response']['name'] || '');
                                        $('#adress').val(data['response']['adres'] || '');
                                        toastr.success('Operacja zakończona powodzeniem!');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Błąd:', error);
                                        // Możesz tutaj dodać kod do obsługi błędów
                                        toastr.error('Operacja zakończona niepowodzeniem!');
                                    }
                                });
                            } else {
                                alert('Proszę wprowadzić numer NIP.');
                            }
                        });
                    });
                </script>
                <!--NIP-->

                <!--ZAPISZ-->
                <div class="flex justify-end mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>
                <!--ZAPISZ-->
            </form>
            <!--Formularz-->
        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
</x-app-layout>