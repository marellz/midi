<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Http\Resources\entity\EntityContributionResource;
use App\Http\Resources\entity\EntityMemberContributionResource;
use App\Models\entity\Entity;
use App\Models\entity\EntityContribution;
use Illuminate\Http\Request;

class EntityContributionController extends Controller
{
    //
    public function index($entity)
    {
        $entity = Entity::findOrFail($entity);
        $contributions = $entity->contributions;
        $data['contributions'] =  EntityContributionResource::collection($contributions);
        $data['member_contributions'] = EntityMemberContributionResource::collection($contributions->first()->memberContributions);
        // $contributions->count() ?  : []; // todo: move to resources later

        // $contributions = EntityContribution::all(); // todo: use this to test if entities can select which contribution "fund" to show

        return $this->respond($data);
    }
}
