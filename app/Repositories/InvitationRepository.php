<?php

namespace App\Repositories;

use App\Models\Invitation;

class InvitationRepository
{
    public function getByCompanyId($companyId)
    {
        return Invitation::where('company_id', $companyId)->get();
    }

    public function countByCompanyId($companyId)
    {
        return Invitation::where('company_id', $companyId)->count();
    }
}
