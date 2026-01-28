<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\WorkBlock;
use App\Repositories\UserRepository;
use App\Steps\WorkBlockUserStep;
use App\Steps\WorkBlockStep;
use Carbon\Carbon;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;
//FORMULARZ DODAWANIA Z KALENADARZA SOLO

class WorkBlockUserWizard extends WizardComponent
{
    public WorkBlock $work_block;
    public User $user;

    public array $steps = [
        WorkBlockUserStep::class,
        WorkBlockStep::class,
    ];
    public function mount($user = null, $date = null)
    {
        $this->user = User::findOrFail($user->id);
        $this->mergeState([
            'user_id' => $this->user->id,
            'start_time' => Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d'),
            'end_time' => Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d'),
            'start_time_clock' => null,
            'end_time_clock' => null,
        ]);
        $this->getUsersChecked();
        $this->setStep(1);
    }

    #[On('dateRangeSelected')]
    public function handleCalendarDateSelected(array $dates)
    {
        $startDate = $dates['startDate'] ?? null;
        $state = $this->getState();
        $night = $state['night'] ?? false;
        if ($startDate != null) {
            $startDateAddDay = Carbon::createFromFormat('Y-m-d', $startDate)->addDay()->format('Y-m-d');
            if ($night) {
                $this->mergeState([
                    'start_time' => $startDate,
                    'end_time' => $startDateAddDay,
                ]);
            } else {
                $this->mergeState([
                    'start_time' => $startDate,
                    'end_time' => $startDate,
                ]);
            }
        }
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
        $this->dispatch('user-selected', user_ids: [$state['user_id']]);
    }
    public function getTimeAndTypeChecked()
    {
        $state = $this->getState();
        $night = $state['night'] ?? false;
        $startDate = $state['start_time'] ?? null;
        if ($startDate != null) {
            $startDateAddDay = Carbon::createFromFormat('Y-m-d', $startDate)->addDay()->format('Y-m-d');
            if ($night) {
                $this->mergeState([
                    'start_time' => $startDate,
                    'end_time' => $startDateAddDay,
                ]);
            } else {
                $this->mergeState([
                    'start_time' => $startDate,
                    'end_time' => $startDate,
                ]);
            }
        }

        $this->dispatch(
            'time-and-type-selected',
            data: [$state['start_time_clock'], $state['end_time_clock'], $night, $startDate],
        );
    }
}
