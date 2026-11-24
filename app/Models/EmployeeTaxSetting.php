<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTaxSetting extends Model
{
    protected $guarded = ['id'];
    protected $casts = ['declarations' => 'array', 'kup_cents' => 'integer', 'pit_reduction_cents' => 'integer', 'health_legacy_reduction_cents' => 'integer',
        'ppk_employee_bp' => 'integer', 'ppk_employer_bp' => 'integer'];
}
