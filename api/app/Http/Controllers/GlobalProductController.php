<?php

namespace App\Http\Controllers;

use App\Http\Resources\global\GlobalProductResource;
use App\Models\global\GlobalProduct;
use Illuminate\Http\Request;

class GlobalProductController extends Controller
{
    //

    public function index()
    {
        $data['products'] = GlobalProductResource::collection(GlobalProduct::all());
        return $this->respond($data);
    }
    
    public function show($id)
    {
        $data['product'] = new GlobalProductResource(GlobalProduct::findOrFail($id));
        return $this->respond($data);
    }
}
