<?php

namespace App\Http\Controllers;

use App\Http\Resources\entity\EntityLoanRequestResource;
use App\Http\Resources\entity\EntityLoanResource;
use App\Http\Resources\member\MemberEntityLoanResource;
use App\Models\entity\Entity;
use App\Models\entity\EntityLoan;
use Illuminate\Http\Request;

class EntityLoanController extends Controller
{
    //

    public function index($entity)
    {
        $entity = Entity::findOrFail($entity);
        $data["loans"] = EntityLoanResource::collection($entity->loans);
        return $this->respond($data);
    }

    public function show($entity, $id)
    {
        $loan = EntityLoan::findOrFail($id);
        $data["loan"] = new EntityLoanResource($loan);
        $data["requests"] = EntityLoanRequestResource::collection($loan->requests);
        $data["active"] = MemberEntityLoanResource::collection($loan->active);
        return $this->respond($data);
    }
}
