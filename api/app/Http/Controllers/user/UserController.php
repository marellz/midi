<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::paginate(10);
        return $this->respond($users);
    }

    public function show(User $user)
    {
        return $this->respond($user);
    }
}
