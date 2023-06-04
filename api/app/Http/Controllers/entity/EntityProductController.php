<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Models\entity\Entity;
use App\Models\entity\EntityProduct;
use Illuminate\Http\Request;

class EntityProductController extends Controller
{
    //

    public function index($entity)
    {
        # code...
        $data['products'] = Entity::find($entity)->products;
        return $this->respond($data);
    }

    public function show($entity, $id)
    {
        $product = EntityProduct::find($id);
        $data['product'] = $product;
        $data['purchases'] = $product->memberPurchases;
        return $this->respond($data);
    }
}
