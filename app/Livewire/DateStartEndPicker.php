<?php

namespace App\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class DateStartEndPicker extends Component
{
    public $start_time_date = '';
    public $end_time_date = '';

    protected $listeners = [
        'date-start-end-selected' => 'date_start_end_selected',
    ];

    public function date_start_end_selected($data)
    {
        if (isset($data[0]) && $data[0]) {
            $this->start_time_date = $data[0];
        }
        if (isset($data[1]) && $data[1]) {
            $this->end_time_date = $data[1];
        }
    }

    public function render()
    {
        return view('livewire.date-start-end-picker');
    }
}
