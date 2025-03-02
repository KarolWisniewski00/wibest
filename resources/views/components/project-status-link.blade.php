@if($project->status == 'W budowie')
<!--status-->
<x-text-cell class="bg-yellow-900 w-full px-4">
    <p class="text-gray-700 dark:text-gray-300 test-sm">
        Status
    </p>
    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
        <x-project-status :project="$project" />
    </p>
</x-text-cell>
<!--status-->
@endif
@if($project->status == 'Aktywne')
<!--status-->
<x-text-cell class="bg-green-900 w-full px-4">
    <p class="text-gray-700 dark:text-gray-300 test-sm">
        Status
    </p>
    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
        <x-project-status :project="$project" />
    </p>
</x-text-cell>
<!--status-->
@endif
@if($project->status == 'Wyłączone')
<!--status-->
<x-text-cell class="bg-red-900 w-full px-4">
    <p class="text-gray-700 dark:text-gray-300 test-sm">
        Status
    </p>
    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
        <x-project-status :project="$project" />
    </p>
</x-text-cell>
<!--status-->
@endif
@if($project->status == 'Error')
<!--status-->
<x-text-cell class="bg-red-900 w-full px-4">
    <p class="text-gray-700 dark:text-gray-300 test-sm">
        Status
    </p>
    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
        <x-project-status :project="$project" />
    </p>
</x-text-cell>
<!--status-->
@endif