<?php

namespace App\Livewire;


use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Steps\LeaveDateStep;
use App\Steps\RcpStep;
use App\Steps\UserStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class RcpWizard extends WizardComponent
{
    public WorkSession $rcp;
    public array $steps = [
        UserStep::class,
        RcpStep::class,
    ];

    #[On('selectDate')]
    public function handleCalendarDateSelected($selectedDate, $typeTime = 'start_time')
    {
        if ($typeTime === 'start_time') {
            $this->mergeState([
                'start_time' => $selectedDate,
            ]);
        }
    }
    public function model(): WorkSession
    {
        return new WorkSession();
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdmin(Auth::user()->company_id);
    }
}
