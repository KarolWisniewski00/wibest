<x-action-section>
    <x-slot name="title">
        Uwierzytelnianie dwuskładnikowe
    </x-slot>

    <x-slot name="description">
        Dodaj dodatkowe zabezpieczenie do swojego konta, korzystając z uwierzytelniania dwuskładnikowego.
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    Dokończ włączanie uwierzytelniania dwuskładnikowego.
                @else
                    Uwierzytelnianie dwuskładnikowe jest włączone.
                @endif
            @else
                Uwierzytelnianie dwuskładnikowe nie jest włączone.
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-gray-400">
            <p>
                Po włączeniu uwierzytelniania dwuskładnikowego podczas logowania zostaniesz poproszony o podanie bezpiecznego, losowego kodu. Kod ten możesz uzyskać w aplikacji Google Authenticator na swoim telefonie.
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            Aby dokończyć włączanie uwierzytelniania dwuskładnikowego, zeskanuj poniższy kod QR za pomocą aplikacji uwierzytelniającej lub wpisz klucz i podaj wygenerowany kod OTP.
                        @else
                            Uwierzytelnianie dwuskładnikowe jest teraz włączone. Zeskanuj poniższy kod QR za pomocą aplikacji uwierzytelniającej lub wpisz klucz.
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                    <p class="font-semibold">
                        Klucz: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label for="code">
                            Kod
                        </x-label>

                        <x-input id="code" type="text" name="code" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                    <p class="font-semibold">
                        Zapisz te kody odzyskiwania w menedżerze haseł. Mogą być użyte do odzyskania dostępu do konta, jeśli utracisz urządzenie do uwierzytelniania dwuskładnikowego.
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 dark:bg-gray-900 dark:text-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button-green type="button" wire:loading.attr="disabled">
                        Włącz
                    </x-button-green>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-button-green class="me-3">
                            Wygeneruj ponownie kody odzyskiwania
                        </x-button-green>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button-green type="button" class="me-3" wire:loading.attr="disabled">
                            Potwierdź
                        </x-button-green>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <x-button-green class="me-3">
                            Pokaż kody odzyskiwania
                        </x-button-green>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-button-red wire:loading.attr="disabled">
                            Anuluj
                        </x-button-red>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-button-red wire:loading.attr="disabled">
                            Wyłącz
                        </x-button-red>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>
