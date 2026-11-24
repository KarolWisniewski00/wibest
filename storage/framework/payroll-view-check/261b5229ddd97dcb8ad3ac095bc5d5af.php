<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['livewire' => false, 'companyId' => null, 'optionalName' => false, 'optionalPhone' => false, 'optionalEmail' => false, 'editUser' => null]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['livewire' => false, 'companyId' => null, 'optionalName' => false, 'optionalPhone' => false, 'optionalEmail' => false, 'editUser' => null]); ?>
<?php foreach (array_filter((['livewire' => false, 'companyId' => null, 'optionalName' => false, 'optionalPhone' => false, 'optionalEmail' => false, 'editUser' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (! $__env->hasRenderedOnce('3dbae916-4d47-4025-9cfa-413f6e3d050c')): $__env->markAsRenderedOnce('3dbae916-4d47-4025-9cfa-413f6e3d050c'); ?>
    <script src="<?php echo e(asset('js/user-identity.js')); ?>"></script>
<?php endif; ?>
<?php
    $initial = $livewire ? $this->state : ['name' => old('name', $editUser?->name), 'email' => old('email', $editUser?->email), 'phone' => old('phone', $editUser?->phone)];
    $inputClass = 'w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold';
?>
<div x-data="wibestIdentity(<?php echo \Illuminate\Support\Js::from($initial)->toHtml() ?>, async email => {
    <?php if($livewire): ?>
        return await $wire.checkEmail(email);
    <?php else: ?>
        const response = await fetch(<?php echo \Illuminate\Support\Js::from(route('users.email-availability'))->toHtml() ?>, {
            method: 'POST', credentials: 'same-origin',
            headers: {'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': <?php echo \Illuminate\Support\Js::from(csrf_token())->toHtml() ?>},
            body: JSON.stringify({email, company_id: <?php echo \Illuminate\Support\Js::from($companyId)->toHtml() ?>, user_id: <?php echo \Illuminate\Support\Js::from($editUser?->id)->toHtml() ?>})
        });
        if (!response.ok) throw new Error('availability');
        return await response.json();
    <?php endif; ?>
}, <?php echo \Illuminate\Support\Js::from($optionalEmail)->toHtml() ?>)">
    <div class="mt-2">
        <label for="identity-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">👤 Imię i nazwisko <?php echo e($optionalName ? '(opcjonalne)' : ''); ?></label>
        <input id="identity-name" type="text" name="name" x-model="name" @blur="normalizeName($event)" <?php if($livewire): ?> wire:model="state.name" <?php endif; ?> value="<?php echo e($initial['name'] ?? ''); ?>" maxlength="255" autocomplete="name" aria-describedby="identity-name-help identity-name-error" class="<?php echo e($inputClass); ?>" <?php if(!$optionalName): echo 'required'; endif; ?>>
        <p id="identity-name-help" aria-live="polite" class="mt-1 min-h-[1.25rem] text-sm transition-colors" :class="nameValid ? 'text-green-700 dark:text-green-400' : 'text-gray-500 dark:text-gray-400'" x-text="nameMessage">Zalecamy podanie imienia i nazwiska (minimum 2 słowa).</p>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = [$livewire ? 'state.name' : 'name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p id="identity-name-error" role="alert" class="text-sm text-red-600 dark:text-red-400"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <div class="mt-2">
        <label for="identity-email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">✉️ Email <?php echo e($optionalEmail ? '(opcjonalne dla CRM)' : ''); ?></label>
        <input id="identity-email" :aria-invalid="emailStatus === 'error'" type="email" name="email" x-model="email" @input="emailChanged()" @blur="emailChanged()" <?php if($livewire): ?> wire:model="state.email" <?php endif; ?> value="<?php echo e($initial['email'] ?? ''); ?>" <?php if(!$optionalEmail): echo 'required'; endif; ?> pattern="[^\s@]+@[^\s@.]+(?:\.[^\s@.]+)+" maxlength="255" autocomplete="email" aria-describedby="identity-email-help identity-email-error" class="<?php echo e($inputClass); ?>">
        <p id="identity-email-help" aria-live="polite" class="mt-1 min-h-[1.25rem] text-sm transition-colors" :class="emailStatus === 'success' ? 'text-green-700 dark:text-green-400' : emailStatus === 'error' ? 'text-red-600 dark:text-red-400' : 'text-gray-500 dark:text-gray-400'"><span aria-hidden="true" x-cloak x-show="emailStatus === 'success'">✓ </span><span x-text="emailMessage">Wpisz adres e-mail, np. jan@firma.pl.</span></p>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = [$livewire ? 'state.email' : 'email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p id="identity-email-error" role="alert" class="text-sm text-red-600 dark:text-red-400"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <div class="mt-2">
        <label for="identity-phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">📞 Telefon <?php echo e($optionalPhone ? '(opcjonalne)' : ''); ?></label>
        <input id="identity-phone" :aria-invalid="Boolean(phone) &amp;&amp; !phoneValid" type="tel" name="phone" x-model="phone" @input="formatPhone($event)" @blur="formatPhone($event)" <?php if($livewire): ?> wire:model="state.phone" <?php endif; ?> value="<?php echo e($initial['phone'] ?? ''); ?>" pattern="(?:\+48|0048|48)?(?:[\s\-]*[0-9]){9}[\s\-]*" autocomplete="tel" aria-describedby="identity-phone-help identity-phone-error" class="<?php echo e($inputClass); ?>" <?php if(!$optionalPhone): echo 'required'; endif; ?>>
        <p id="identity-phone-help" aria-live="polite" class="mt-1 min-h-[1.25rem] text-sm transition-colors" :class="phoneValid ? 'text-green-700 dark:text-green-400' : phone ? 'text-red-600 dark:text-red-400' : 'text-gray-500 dark:text-gray-400'" x-text="<?php echo \Illuminate\Support\Js::from($optionalPhone)->toHtml() ?> && !phone ? 'Pole opcjonalne. Jeśli podasz numer, wpisz 9 cyfr, np. 111 222 333.' : phoneMessage"><?php echo e($optionalPhone ? 'Pole opcjonalne. Jeśli podasz numer, wpisz 9 cyfr, np. 111 222 333.' : 'Podaj 9-cyfrowy numer telefonu.'); ?></p>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = [$livewire ? 'state.phone' : 'phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p id="identity-phone-error" role="alert" class="text-sm text-red-600 dark:text-red-400"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\user-identity-fields.blade.php ENDPATH**/ ?>