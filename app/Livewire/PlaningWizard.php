<?php

namespace App\Livewire;


use App\Models\Leave;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Steps\DayWeekStep;
use App\Steps\LeaveDateStep;
use App\Steps\LeaveStep;
use App\Steps\ManagerStep;
use App\Steps\TimeStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class PlaningWizard extends WizardComponent
{
    public User $user;

    public array $steps = [
        DayWeekStep::class,
        TimeStep::class,
    ];
    // 👇 Wczytaj model z bazy na podstawie ID
    public function mount($userId = null)
    {
        $this->user = User::findOrFail($userId);

        $this->mergeState([
            'working_hours_start_day' => $this->user->working_hours_start_day,
            'working_hours_stop_day' => $this->user->working_hours_stop_day,
            'working_hours_from' => date('H:i', strtotime($this->user->working_hours_from)),
            'working_hours_to' => date('H:i', strtotime($this->user->working_hours_to)),
            'user_id'   => $userId,
        ]);
    }
    public function model(): User
    {
        return $this->user;
    }
}
