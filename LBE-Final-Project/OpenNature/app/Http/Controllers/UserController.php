<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function view()
    {
        $user = User::where('user-id', 1)->firstOrFail();
        return view('/user/user', compact('user'));
    }
}
