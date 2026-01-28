<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use App\Models\WorkBlock;
use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Steps\EditWorkBlockStep;
use App\Steps\WorkBlockStep;
use App\Steps\WorkBlockUserStep;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class EditWorkBlockWizard extends WizardComponent
{
    public WorkBlock $work_block;
    public User $user;

    public array $steps = [
        WorkBlockUserStep::class,
        EditWorkBlockStep::class,
    ];
    // 👇 Wczytaj model z bazy na podstawie ID
    public function mount($workBlockId = null)
    {
        $this->work_block = WorkBlock::findOrFail($workBlockId);
        $this->user = User::findOrFail($this->work_block->user_id);

        if ($this->work_block->type == 'night') {
            $isNight = true;
        } else {
            $isNight = false;
        }

        $this->mergeState([
            'user_id' => $this->work_block->user_id,
            'start_time' => $this->work_block->starts_at->format('Y-m-d'),
            'start_time_clock' => $this->work_block->starts_at->format('H:i:s'),
            'end_time_clock' => $this->work_block->ends_at->format('H:i:s'),
            'work_block_id'   => $workBlockId,
            'night' => $isNight
        ]);
        $this->getUsersChecked();
        $this->getTimeAndTypeChecked();
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
    // 👇 Zwróć już wczytany model
    public function model(): WorkBlock
    {
        return $this->workBlock;
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
