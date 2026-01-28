<?php

namespace App\Steps;

use App\Mail\UserMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\Components\Step;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class EditSupervisorStep extends Step
{
    protected string $view = 'livewire.steps.edit-supervisor-step';

    public $supervisor_id;

    protected $rules = [
        'supervisor_id' => 'required|integer',
    ];

    public function mount()
    {
        $this->supervisor_id = null;
    }

    public function save($state)
    {
        $user = User::findOrFail($state['user_id']);
        $user->supervisor_id = $state['supervisor_id'];
        $user->save();

        return redirect()->route($state['route_back'], $user)->with('success', 'Operacja zakończona powodzeniem.');
    }
    public function validate()
    {
        return [
            [
                'state.supervisor_id'     => ['required'],
            ],
            [],
            [
                'state.supervisor_id'     => __('supervisor_id'),
            ],
        ];
    }
    public function icon(): string
    {
        return 'user';
    }

    public function title(): string
    {
        return __('👤 Wybierz przełożonego');
    }
}
