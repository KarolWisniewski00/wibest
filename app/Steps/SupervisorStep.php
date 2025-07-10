<?php

namespace App\Steps;

use App\Mail\UserMail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\Components\Step;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class SupervisorStep extends Step
{
    protected string $view = 'livewire.steps.supervisor-step';

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
        $user = $this->model;
        $password = Str::random(10);

        $user->name = $state['name'];
        $user->email = $state['email'];
        $user->phone = $state['phone'];
        $user->position = $state['position'];
        $user->role = $state['role'];
        $user->assigned_at = now();
        $user->supervisor_id = $state['supervisor_id'];
        $user->company_id = Auth::user()->company_id;
        $user->password = Hash::make($password);
        $user->save();

        $userMail = new UserMail($user, $password);
        try {
            Mail::to($user->email)->send($userMail);
        } catch (Exception) {
        }

        return redirect()->route('team.user.index')->with('success', 'Operacja zakończona powodzeniem.');
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
        return 'check';
    }

    public function title(): string
    {
        return __('Wybierz przełożonego');
    }
}
