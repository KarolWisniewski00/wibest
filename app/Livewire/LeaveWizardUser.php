<?php

namespace App\Livewire;


use App\Models\Leave;
use App\Repositories\UserRepository;
use App\Steps\LeaveDateStep;
use App\Steps\LeaveStep;
use App\Steps\LeaveUserStep;
use App\Steps\ManagerStep;
use App\Steps\UserLeaveDateStep;
use App\Steps\UserStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class LeaveWizardUser extends WizardComponent
{
    public Leave $leave;
    public array $steps = [
        UserStep::class,
        LeaveStep::class,
        UserLeaveDateStep::class
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
