<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Http\Resources\entity\EntityMemberProductPurchaseResource;
use App\Http\Resources\entity\EntityProductResource;
use App\Models\entity\Entity;
use App\Models\entity\EntityProduct;
use Illuminate\Http\Request;

class EntityProductController extends Controller
{
    //

    public function index($entity)
    {
        # code...
        $products = Entity::find($entity)->products;
        $data['products'] = EntityProductResource::collection($products);
        return $this->respond($data);
    }

    public function show($entity, $id)
    {
        $product = EntityProduct::find($id);
        $data['product'] = new EntityProductResource($product);
        $data['purchases'] = EntityMemberProductPurchaseResource::collection($product->memberPurchases);
        return $this->respond($data);
    }
}
