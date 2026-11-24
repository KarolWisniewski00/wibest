@props(['id', 'label', 'help'])
<div {{ $attributes->merge(['class' => 'payroll-field min-w-0']) }}>
    <div class="payroll-field-control min-w-0">
        <label for="{{ $id }}" class="block text-sm font-semibold">{{ $label }}</label>
        {{ $slot }}
    </div>
    <p id="{{ $id }}-help" class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-400">{{ $help }}</p>
</div>
