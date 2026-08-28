<?php

namespace App\Livewire;


use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Steps\UserStep;
use App\Steps\TimeStartStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;

class RcpStartWizard extends WizardComponent
{
    public WorkSession $rcp;
    public array $steps = [
        UserStep::class,
        TimeStartStep::class,
    ];
    public function model(): WorkSession
    {
        return new WorkSession();
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        if (Auth::user()->role == 'menedżer') {
            return $userRepository->getByManager();
        }
        return $userRepository->getByAdmin();
    }
    public function getUsersChecked()
    {
        $state = $this->getState();
        $this->dispatch('user-selected', user_ids: [$state['user_id']]);
    }
    public function getTimeAndTypeChecked()
    {
        $state = $this->getState();
        $this->dispatch(
            'time-and-type-selected',
            data: [$state['start_time_clock']],
            rcp: true,
        );
    }
}
