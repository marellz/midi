<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function respond($data, $code = null)
    {
        // return ResponseBuilder::asSuccess($code)->withData($data)->build();
        return response()->json($data);
    }

    public function respondWithData($data)
    {
        return ResponseBuilder::asSuccess()->withData($data)->build();
    }

    public function respondWithMessage($msg)
    {
        return ResponseBuilder::asSuccess()->withMessage($msg)->build();
    }

    public function respondWithCode($code)
    {
        return ResponseBuilder::asSuccess($code)->build();
    }

    public function respondWithError($http_code, $message = "Error")
    {
        return ResponseBuilder::asError(400)->withHttpCode($http_code)->withMessage($message)->build();
    }

    public function respondBadRequest($message = "Bad request")
    {
        return $this->respondWithError(400, $message);
    }

    public function respondUnAuthorizedRequest($message = "Forbidden")
    {
        return $this->respondWithError(403, $message);
    }

    public function respondNotFound($message = "Not found")
    {
        return $this->respondWithError(404, $message);
    }

    public function paginate($items)
    {
        return [
            'currentPage' => $items->currentPage(),
            'total' => $items->total(),
            'perPage' => $items->perPage(),
            'lastPage' => $items->lastPage(),
            'onFirstPage' => $items->onFirstPage(),
            'onLastPage' => $items->onLastPage(),
        ];
    }


    // public function uploadPhoto($file, $folder = 'uploads')
    // {
    //     \Tinify\setKey(Config::get('tinify.tinify_api_key'));
    //     $optimized = \Tinify\fromFile($file);
    //     $path = $folder . '/' . $file->hashName();
    //     $optimized->toFile($path);
    //     return $path;
    // }
}
