@props(['user'])

<li class="snap-center">
    <div class="h-full inline-flex items-center justify-between w-full p-4
                text-gray-500 bg-white border-2 border-gray-200 rounded-lg
                hover:text-gray-600 hover:bg-gray-50
                dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-3">
            @if($user->company)
            <p class="text-start font-semibold text-gray-900 dark:text-gray-50">
                <x-label-link-company href="{{route('setting.client.show', $user->company)}}" class="flex justify-start items-center font-semibold uppercase tracking-widest">
                    {{ $user->company->name }}
                </x-label-link-company>
            </p>
            @else
            <p class="text-start font-semibold text-gray-900 dark:text-gray-50">
                <x-alert-link href="{{route('setting.user.edit-company', $user)}}">
                    Brak firmy
                </x-alert-link>
            </p>
            @endif

            @if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null)
            @else
            @if($user->company)
            @if(!request()->routeIs('setting'))
            <p class="text-start font-semibold text-gray-900 dark:text-gray-50">
                <x-alert-link href="{{route('setting.user.edit-planing', $user)}}">
                    Ustaw godziny pracy
                </x-alert-link>
            </p>
            @else
            <p class="text-start font-semibold text-gray-900 dark:text-gray-50">
                <x-alert-link href="{{route('team.user.planing', $user)}}">
                    Ustaw godziny pracy
                </x-alert-link>
            </p>
            @endif
            @else
            @endif
            @endif

            <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                <x-user-photo :user="$user" />
                <x-user-name :user="$user" />
            </div>

            <div class="flex space-x-3">
                <x-button-link-neutral href="{{route('setting.user.show', $user)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
            </div>
        </div>
    </div>
</li>