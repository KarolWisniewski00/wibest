<div>
    @php
    $users = $this->getUsers();
    $this->getUsersChecked();
    @endphp
    <div class="mb-4">
        <div id="supervisor">
            <x-label-form value="👤 Wybierz przełożonego" />
            <ul class="grid w-full gap-4 md:grid-cols-3">
                @foreach ($users as $user)
                @if ($user->role == 'admin' || $user->role == 'menedżer' || $user->role == 'właściciel')
                <li>
                    <input name="supervisor_id" wire:model="state.supervisor_id" type="radio" id="supervisor-{{ $user->id }}" value="{{ $user->id }}" class="hidden peer">
                    <label for="supervisor-{{ $user->id }}" class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="flex items-center gap-2">
                            <x-user-photo :user="$user" />
                            <x-user-name :user="$user" />
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