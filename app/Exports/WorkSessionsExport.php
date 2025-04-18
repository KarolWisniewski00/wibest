<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class WorkSessionsExport implements FromCollection
{
    public $sessions;

    public function __construct($sessions)
    {
        $this->sessions = $sessions;
    }

    public function collection()
    {
        return $this->sessions;
    }
}
