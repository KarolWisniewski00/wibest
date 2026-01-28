<?php

namespace App\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class TimeAndTypePicker extends Component
{
    public $start_time_clock = '';
    public $end_time_clock = '';
    public $night = '';
    public $start_time_date = '';
    public $rcp = false;

    protected $listeners = [
        'time-and-type-selected' => 'time_and_type_selected',
    ];

    public function time_and_type_selected($data, $rcp = false)
    {
        $this->start_time_clock = $data[0];
        $this->end_time_clock = $data[1];
        $this->night = $data[2];
        if (isset($data[3]) && $data[3]) {
            $this->start_time_date = $data[3];
        }
        if ($rcp) {
            $this->rcp = $rcp;
        }
    }

    public function render()
    {
        if ($this->rcp) {
            return view('livewire.rcp-time-and-type-picker');
        } else {
            return view('livewire.time-and-type-picker');
        }
    }
}
