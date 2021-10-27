<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller {

    public function follow(User $user)
    {
        auth()->user()->follow($user);

        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user);

        return redirect()->back();
    }

}