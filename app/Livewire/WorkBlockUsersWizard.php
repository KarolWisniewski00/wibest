<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\WorkBlock;
use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Steps\LeaveDateStep;
use App\Steps\RcpStep;
use App\Steps\UsersStep;
use App\Steps\UserStep;
use App\Steps\WorkBlockDateStep;
use App\Steps\WorkBlockStep;
use App\Steps\WorkBlockTimeStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class WorkBlockUsersWizard extends WizardComponent
{
    public WorkBlock $work_block;

    public array $steps = [
        UsersStep::class,
        WorkBlockTimeStep::class,
        WorkBlockDateStep::class,
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

        $this->getDateStartEndChecked();
    }
    public function model(): WorkBlock
    {
        return new WorkBlock();
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdminWorkBlock();
    }
    public function getUsersChecked()
    {
        $state = $this->getState();
        $this->dispatch('user-selected', user_ids: $state['user_ids']);
    }
    public function getTimeAndTypeChecked()
    {
        $state = $this->getState();
        $this->dispatch(
            'time-and-type-selected',
            data: [$state['start_time_clock'], $state['end_time_clock'], $state['night']],
        );
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
