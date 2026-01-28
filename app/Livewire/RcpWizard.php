<?php

namespace App\Livewire;


use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Steps\RcpDateStep;
use App\Steps\UsersStep;
use App\Steps\WorkBlockTimeStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class RcpWizard extends WizardComponent
{
    public WorkSession $rcp;
    public array $steps = [
        UsersStep::class,
        WorkBlockTimeStep::class,
        RcpDateStep::class,
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
        $this->dispatch('user-selected', user_ids: $state['user_ids']);
    }
    public function getTimeAndTypeChecked()
    {
        $state = $this->getState();
        $this->dispatch(
            'time-and-type-selected',
            data: [$state['start_time_clock'], $state['end_time_clock'], $state['night']],
            rcp: true,
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
