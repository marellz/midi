<?php

namespace App\Http\Controllers;

use App\Models\global\GlobalProduct;
use Illuminate\Http\Request;

class GlobalProductController extends Controller
{
    //

    public function index()
    {
        $data['products'] = GlobalProduct::all();
        return $this->respond($data);
    }
    
    public function show($id)
    {
        $data['product'] = GlobalProduct::findOrFail($id);
        return $this->respond($data);
    }
}
