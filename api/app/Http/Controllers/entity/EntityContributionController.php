<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Models\entity\Entity;
use App\Models\entity\EntityContribution;
use Illuminate\Http\Request;

class EntityContributionController extends Controller
{
    //
    public function index($entity)
    {
        $entity = Entity::findOrFail($entity);
        $data['contributions'] = $entity->contributions;
        $data['member_contributions'] = $entity->contributions->first()->memberContributions; // todo: move to resources later
        // $contributions = EntityContribution::all(); // todo: use this to test if entities can select which contribution "fund" to show

        return $this->respond($data);
    }
}
