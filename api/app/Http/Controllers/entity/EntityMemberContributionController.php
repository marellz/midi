<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Http\Resources\entity\EntityMemberContributionResource;
use App\Models\entity\EntityContribution;
use Illuminate\Http\Request;

class EntityMemberContributionController extends Controller
{
    //
    public function index($entity_id, $contribution_id)
    {

        // contributions for a single entity-contribution
        $contribution =  EntityContribution::findOrFail($contribution_id);
        $member_contributions = $contribution->memberContributions;
        $data['contributions'] = EntityMemberContributionResource::collection($member_contributions);
        
        return $this->respond($data);
    }
}
