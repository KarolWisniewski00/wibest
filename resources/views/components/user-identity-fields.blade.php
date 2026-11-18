@props(['livewire' => false, 'companyId' => null, 'optionalName' => false, 'optionalPhone' => false, 'optionalEmail' => false, 'editUser' => null])
@once
    <script src="{{ asset('js/user-identity.js') }}"></script>
@endonce
@php
    $initial = $livewire ? $this->state : ['name' => old('name', $editUser?->name), 'email' => old('email', $editUser?->email), 'phone' => old('phone', $editUser?->phone)];
    $inputClass = 'w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold';
@endphp
<div x-data="wibestIdentity(@js($initial), async email => {
    @if($livewire)
        return await $wire.checkEmail(email);
    @else
        const response = await fetch(@js(route('users.email-availability')), {
            method: 'POST', credentials: 'same-origin',
            headers: {'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': @js(csrf_token())},
            body: JSON.stringify({email, company_id: @js($companyId), user_id: @js($editUser?->id)})
        });
        if (!response.ok) throw new Error('availability');
        return await response.json();
    @endif
}, @js($optionalEmail))">
    <div class="mt-2">
        <label for="identity-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">👤 Imię i nazwisko {{ $optionalName ? '(opcjonalne)' : '' }}</label>
        <input id="identity-name" type="text" name="name" x-model="name" @blur="normalizeName($event)" @if($livewire) wire:model="state.name" @endif value="{{ $initial['name'] ?? '' }}" maxlength="255" autocomplete="name" aria-describedby="identity-name-help identity-name-error" class="{{ $inputClass }}" @required(!$optionalName)>
        <p id="identity-name-help" aria-live="polite" class="mt-1 min-h-[1.25rem] text-sm transition-colors" :class="nameValid ? 'text-green-700 dark:text-green-400' : 'text-gray-500 dark:text-gray-400'" x-text="nameMessage">Zalecamy podanie imienia i nazwiska (minimum 2 słowa).</p>
        @error($livewire ? 'state.name' : 'name') <p id="identity-name-error" role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
    </div>
    <div class="mt-2">
        <label for="identity-email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">✉️ Email {{ $optionalEmail ? '(opcjonalne dla CRM)' : '' }}</label>
        <input id="identity-email" :aria-invalid="emailStatus === 'error'" type="email" name="email" x-model="email" @input="emailChanged()" @blur="emailChanged()" @if($livewire) wire:model="state.email" @endif value="{{ $initial['email'] ?? '' }}" @required(!$optionalEmail) pattern="[^\s@]+@[^\s@.]+(?:\.[^\s@.]+)+" maxlength="255" autocomplete="email" aria-describedby="identity-email-help identity-email-error" class="{{ $inputClass }}">
        <p id="identity-email-help" aria-live="polite" class="mt-1 min-h-[1.25rem] text-sm transition-colors" :class="emailStatus === 'success' ? 'text-green-700 dark:text-green-400' : emailStatus === 'error' ? 'text-red-600 dark:text-red-400' : 'text-gray-500 dark:text-gray-400'"><span aria-hidden="true" x-cloak x-show="emailStatus === 'success'">✓ </span><span x-text="emailMessage">Wpisz adres e-mail, np. jan@firma.pl.</span></p>
        @error($livewire ? 'state.email' : 'email') <p id="identity-email-error" role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
    </div>
    <div class="mt-2">
        <label for="identity-phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">📞 Telefon {{ $optionalPhone ? '(opcjonalne)' : '' }}</label>
        <input id="identity-phone" :aria-invalid="Boolean(phone) &amp;&amp; !phoneValid" type="tel" name="phone" x-model="phone" @input="formatPhone($event)" @blur="formatPhone($event)" @if($livewire) wire:model="state.phone" @endif value="{{ $initial['phone'] ?? '' }}" pattern="(?:\+48|0048|48)?(?:[\s\-]*[0-9]){9}[\s\-]*" autocomplete="tel" aria-describedby="identity-phone-help identity-phone-error" class="{{ $inputClass }}" @required(!$optionalPhone)>
        <p id="identity-phone-help" aria-live="polite" class="mt-1 min-h-[1.25rem] text-sm transition-colors" :class="phoneValid ? 'text-green-700 dark:text-green-400' : phone ? 'text-red-600 dark:text-red-400' : 'text-gray-500 dark:text-gray-400'" x-text="@js($optionalPhone) && !phone ? 'Pole opcjonalne. Jeśli podasz numer, wpisz 9 cyfr, np. 111 222 333.' : phoneMessage">{{ $optionalPhone ? 'Pole opcjonalne. Jeśli podasz numer, wpisz 9 cyfr, np. 111 222 333.' : 'Podaj 9-cyfrowy numer telefonu.' }}</p>
        @error($livewire ? 'state.phone' : 'phone') <p id="identity-phone-error" role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
    </div>
</div>
