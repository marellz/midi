<?php

namespace App\Http\Controllers;

use App\Models\entity\Entity;
use App\Models\entity\EntityLoan;
use Illuminate\Http\Request;

class EntityLoanController extends Controller
{
    //

    public function index($entity)
    {
        $entity = Entity::findOrFail($entity);
        $data["loans"] = $entity->loans;
        return $this->respond($data);
    }

    public function show($entity, $id)
    {
        $loan = EntityLoan::findOrFail($id);
        $data["loan"] = $loan;
        $data["requests"] = $loan->requests;
        $data["active"] = $loan->active;
        return $this->respond($data);
    }
}
