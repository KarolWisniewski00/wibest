<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class TimeSheetExport implements FromCollection
{
    public $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        return $this->users;
    }
}
