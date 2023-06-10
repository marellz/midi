<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Http\Resources\entity\EntityMembersResource;
use App\Models\entity\Entity;
use App\Models\entity\EntityMember;
use Illuminate\Http\Request;

class EntityMemberController extends Controller
{
    //

    public function index($id)
    {
        $entity = Entity::findOrFail($id);
        // $members = collect([]);
        // foreach ($entity->members as $mem) {
        //     $members->push($mem->user);
        // }
        $data['members'] = EntityMembersResource::collection($entity->members);
        return $this->respond($data);
    }


    public function show($entity, $id)
    {
        $member = EntityMember::findOrFail($id);
        $data['member'] = new EntityMembersResource($member);
        return $this->respond($data);
    }
}
