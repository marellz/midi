<?php

namespace App\Http\Controllers\entity;

use App\Http\Controllers\Controller;
use App\Http\Resources\entity\EntityMemberProductPurchaseResource;
use App\Models\entity\EntityProduct;
use Illuminate\Http\Request;

class EntityProductPurchaseController extends Controller
{
    //

    public function index($entity, $product)
    {
        $product = EntityProduct::findOrFail($product);
        $data['purchases'] = EntityMemberProductPurchaseResource::collection($product->memberPurchases);;
        return $this->respond($data);
    }
}
