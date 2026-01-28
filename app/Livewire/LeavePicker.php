<?php

namespace App\Livewire;

use Livewire\Component;

class LeavePicker extends Component
{
    public $type = '';
    public $start_time_date = '';
    public $end_time_date = '';

    protected $listeners = [
        'leave-selected' => 'leave_selected',
    ];

    public function leave_selected($data)
    {
        $this->type = $data[0];
        if (isset($data[1]) && $data[1]) {
            $this->start_time_date = $data[1];
        }
        if (isset($data[2]) && $data[2]) {
            $this->end_time_date = $data[2];
        }
    }

    public function render()
    {
        return view('livewire.leave-picker');
    }
}
