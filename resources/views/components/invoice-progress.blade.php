@if($invoice->paid == 'opłacono')
<!-- Progress -->
<div class="flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-green-300 text-xs text-white text-center whitespace-nowrap dark:text-gray-900 dark:bg-green-300 transition duration-500" style="width: 100%">100%</div>
</div>
@else
@php
$brutto = $invoice->total;
$paid = $invoice->paid_part;
if($paid != null && $brutto != 0){
$remaining_percent = ($paid / $brutto) * 100;
}else{
$remaining_percent = 'error';
}
@endphp
@if($remaining_percent != 'error')
<!-- Progress -->
<div class="flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700" role="progressbar" aria-valuenow="{{round($remaining_percent, 2)}}" aria-valuemin="0" aria-valuemax="100">
    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-green-300 text-xs text-white text-center whitespace-nowrap dark:text-gray-900 dark:bg-green-300 transition duration-500" style="width: {{round($remaining_percent, 2)}}%">{{round($remaining_percent, 2)}}%</div>
</div>
@else
<!-- Progress -->
<div class="flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-red-600 text-xs text-white text-center whitespace-nowrap dark:text-gray-900 dark:bg-red-300 transition duration-500" style="width: 100%">ERROR</div>
</div>
@endif
@endif