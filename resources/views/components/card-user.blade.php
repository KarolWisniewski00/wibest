@props(['user'])
<li class="snap-center">
    <div class="h-full inline-flex items-center justify-between w-full p-4
                text-gray-500 bg-white border-2 border-gray-200 rounded-lg
                hover:text-gray-600 hover:bg-gray-50
                dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-4">
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs text-start">
                        <x-status-gray>
                            <span>🏢</span>@if($user->company) {{ $user->company->name }} @endif
                        </x-status-gray>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs whitespace-nowrap gap-2">
                        <x-status-gray>
                            Data dołączenia
                        </x-status-gray>
                        <x-status-cello>
                            {{ $user->assigned_at ? $user->assigned_at->format('d.m.Y') : '' }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            @if($user->paid_until)
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs whitespace-nowrap gap-2">
                        <x-status-gray>
                            Opłacono do
                        </x-status-gray>
                        <x-status-cello>
                            {{ $user->paid_until ? $user->paid_until->format('d.m.Y') : '' }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            @endif

            <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                <x-user-photo :user="$user" />
                <x-user-name :user="$user" />
            </div>

            <div class="flex space-x-3">
                @if(!request()->routeIs('setting'))
                <x-button-link-neutral href="{{route('setting.user.show', $user)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
                @else
                <x-button-link-neutral href="{{route('team.user.show', $user)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
                @endif
            </div>
        </div>
    </div>
</li>