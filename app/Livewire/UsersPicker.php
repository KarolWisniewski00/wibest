<?php

namespace App\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class UsersPicker extends Component
{
    public $selectedUsers = [];

    protected $listeners = [
        'user-selected' => 'user_selected',
    ];

    public function user_selected($user_ids)
    {
        $this->selectedUsers = [];
        foreach ($user_ids as $key => $value) {
            if ($value != null) {
                array_push($this->selectedUsers, User::where('id', $value)->first());
            }
        }
    }

    public function render()
    {
        return view('livewire.users-picker');
    }
}
