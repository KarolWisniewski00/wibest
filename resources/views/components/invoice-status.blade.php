@if($invoice->status == 'wystawiona')
<span class="inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold text-xs uppercase tracking-widest hover:text-yellow-700 dark:hover:text-yellow-300 transition ease-in-out duration-150">
    {{ $invoice->status }}
</span>
@endif
@if($invoice->status == 'opłacona')
<span class="inline-flex p-2 items-center text-green-300 dark:text-green-300 font-semibold text-xs uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
    {{ $invoice->status }}
</span>
@endif