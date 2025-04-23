<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class EventsExport implements FromCollection
{
    public $events;

    public function __construct($events)
    {
        $this->events = $events;
    }

    public function collection()
    {
        return $this->events;
    }
}
