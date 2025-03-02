<div class="flex justify-start items-center w-full">
    @if($invoice->invoice_type == "faktura proforma")
    <span class="inline-flex p-2 items-center bg-violet-500 dark:bg-violet-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-violet-700 dark:hover:bg-violet-300 focus:bg-violet-700 dark:focus:bg-violet-300 active:bg-violet-900 dark:active:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 transition ease-in-out duration-150">PRO</span>
    @if($invoice->invoice_id)
    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mx-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
    <span class="inline-flex p-2 items-center bg-green-300 dark:bg-green-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">FVS</span>
    @endif
    @elseif($invoice->invoice_type == "faktura sprzedażowa")
    <span class="inline-flex p-2 items-center bg-green-300 dark:bg-green-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">FVS</span>
    @if($invoice->invoice_id)
    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mx-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
    <span class="inline-flex p-2 items-center bg-violet-500 dark:bg-violet-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-violet-700 dark:hover:bg-violet-300 focus:bg-violet-700 dark:focus:bg-violet-300 active:bg-violet-900 dark:active:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 transition ease-in-out duration-150">PRO</span>
    @endif
    @elseif($invoice->invoice_type == "faktura")
    <span class="inline-flex p-2 items-center bg-green-300 dark:bg-green-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">FVS</span>
    @endif
    <span class="ps-3 font-semibold text-lg text-gray-700 dark:text-gray-50">
        {{ substr($invoice->number, 3) }}
    </span>
</div>