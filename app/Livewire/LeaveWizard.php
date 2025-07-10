<?php

namespace App\Livewire;


use App\Models\Leave;
use App\Repositories\UserRepository;
use App\Steps\LeaveDateStep;
use App\Steps\LeaveStep;
use App\Steps\ManagerStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class LeaveWizard extends WizardComponent
{
    public Leave $leave;
    public array $steps = [
        ManagerStep::class,
        LeaveStep::class,
        LeaveDateStep::class
    ];
    #[On('selectDate')]
    public function handleCalendarDateSelected($selectedDate, $typeTime = 'start_time')
    {
        if ($typeTime === 'start_time') {
            $this->mergeState([
                'start_time' => $selectedDate,
            ]);
        } else {
            $this->mergeState([
                'end_time' => $selectedDate,
            ]);
        }
    }
    public function model(): Leave
    {
        return new Leave();
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdmin(Auth::user()->company_id);
    }
}
