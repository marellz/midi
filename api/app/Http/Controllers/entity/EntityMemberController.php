<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Models\entity\Entity;
use App\Models\entity\EntityMember;
use Illuminate\Http\Request;

class EntityMemberController extends Controller
{
    //

    public function index($id)
    {
        $entity = Entity::findOrFail($id);
        $members = collect([]);
        foreach ($entity->members as $mem) {
            $members->push($mem->user);
        }
        return $this->respond($members);
    }


    public function show($entity, $id)
    {
        $member = EntityMember::findOrFail($id)->user;
        return $this->respond($member);
    }
}
