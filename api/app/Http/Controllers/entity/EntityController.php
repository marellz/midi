<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Models\entity\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    //

    public function index()
    {
        $entities = Entity::all();
        return $this->respond($entities);
    }

    public function show(Entity $entity)
    {
        $data['entity'] = $entity;
        return $this->respond($data);
    }
}
