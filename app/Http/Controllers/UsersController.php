<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller {

    public function profile(User $user)
    {
        return view("user.profile", [
            "user" => $user,
        ]);
    }

    public function userList()
    {

        return view("user.user-list", [
            "users" => User::all(),
        ]);
    }

}