@if($project->status == 'W budowie')
<span class="inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-700 dark:hover:text-yellow-300 transition ease-in-out duration-150">
    {{ $project->status }}
</span>
@endif
@if($project->status == 'Aktywne')
<span class="inline-flex p-2 items-center text-green-300 dark:text-green-300 font-semibold uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
    {{ $project->status }}
</span>
@endif
@if($project->status == 'Wyłączone')
<span class="inline-flex p-2 items-center text-red-300 dark:text-red-300 font-semibold uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
    {{ $project->status }}
</span>
@endif
@if($project->status == 'Error')
<span class="inline-flex p-2 items-center text-red-300 dark:text-red-300 font-semibold uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
    {{ $project->status }}
</span>
@endif