<?php

namespace App\Steps;

use App\Services\CreateUser;
use Vildanbina\LivewireWizard\Components\Step;

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
        $wizard = $this->getLivewire();
        $user = app(CreateUser::class)->create(
            $state, (int) $wizard->company_id, $wizard->clients
        );
        $wizard->model = $user;
        session()->flash('success', 'Użytkownik został pomyślnie utworzony.');

        return $wizard->redirectRoute($wizard->clients ? 'setting.client.show' : 'team.user.index',
            $wizard->clients ? ['client' => $wizard->company_id] : []);
    }

    public function validate()
    {
        return [
            [
                'state.supervisor_id' => ['required'],
            ],
            [],
            [
                'state.supervisor_id' => __('supervisor_id'),
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
