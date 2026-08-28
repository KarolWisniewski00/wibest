<?php

namespace App\Livewire;


use App\Models\Leave;
use App\Models\LeaveBalance;
use App\Repositories\UserRepository;
use App\Steps\LeaveDateStep;
use App\Steps\LeaveStep;
use App\Steps\ManagerStep;
use Exception;
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

    #[On('dateRangeSelected')]
    public function handleCalendarDateSelected(array $dates)
    {
        $startDate = $dates['startDate'] ?? null;
        $endDate = $dates['endDate'] ?? null;

        $this->mergeState([
            'start_time' => $startDate,
            'end_time' => $endDate,
        ]);

        $this->getLeaveChecked();
        $this->getDateStartEndChecked();
    }
    public function model(): Leave
    {
        return new Leave();
    }
    public function getLeaveFree()
    {
        try {
            $leave_balance = LeaveBalance::where('user_id', Auth::id())
                ->where('company_id', Auth::user()->company_id)
                ->where('year', now()->year)
                ->first();
            $carried_over = $leave_balance->carried_over ?? 0;
            $base_days = $leave_balance->base_days ?? 0;
            return ($carried_over + $base_days) - $leave_balance->used_days;
        } catch (Exception) {
            return 0;
        }
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getManagers();
    }
    public function getUsersChecked()
    {
        $state = $this->getState();
        $this->dispatch('user-selected', user_ids: [$state['manager_id']]);
    }
    public function getLeaveChecked()
    {
        $state = $this->getState();
        $this->dispatch('leave-selected', data: [$state['type'], $state['start_time'] ?? '', $state['end_time'] ?? '']);
    }
    public function getDateStartEndChecked()
    {
        $state = $this->getState();
        $this->dispatch(
            'date-start-end-selected',
            data: [$state['start_time'] ?? '', $state['end_time'] ?? ''],
        );
    }
}
