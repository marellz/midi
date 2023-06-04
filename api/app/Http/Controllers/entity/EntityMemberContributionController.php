<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Models\entity\EntityContribution;
use Illuminate\Http\Request;

class EntityMemberContributionController extends Controller
{
    //
    public function index($entity_id, $contribution_id)
    {
        $contribution =  EntityContribution::findOrFail($contribution_id);
        $member_contributions = $contribution->memberContributions;
        return $this->respond($member_contributions);
    }
}
