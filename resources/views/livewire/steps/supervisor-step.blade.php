<div>
    @php
    $users = $this->getUsers()
    @endphp
    <div class="space-y-6 px-6 py-4">
        <div class="mb-6" id="supervisor">
            <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Przełożony</h3>
            <ul class="grid w-full gap-6 md:grid-cols-3">
                @foreach ($users as $user)
                @if ($user->role == 'admin' || $user->role == 'menedżer')
                <li>
                    <input name="supervisor_id" wire:model="state.supervisor_id" type="radio" id="supervisor-{{ $user->id }}" value="{{ $user->id }}" class="hidden peer">
                    <label for="supervisor-{{ $user->id }}" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="flex items-center gap-4">
                            @if($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                            @else
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            @endif
                            <div>
                                <div class="text-lg font-semibold mb-1">{{ $user->name }}</div>
                                <div class="text-sm text-gray-400">
                                    @switch($user->role)
                                    @case('admin')
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Admin</span>
                                    @break
                                    @case('menedżer')
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Menedżer</span>
                                    @break
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </label>
                </li>
                @endif
                @endforeach
            </ul>
            <p class="text-red-500 text-sm mt-1 dark:text-red-400">{{ $message ?? '' }}</p>
        </div>
    </div>

</div>