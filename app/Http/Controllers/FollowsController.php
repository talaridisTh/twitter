<?php

namespace App\Http\Controllers;

use App\Mail\FollowersMail;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FollowsController extends Controller {

    public function follow(User $user)
    {
        auth()->user()->follow($user);

        Mail::to($user->email)->queue(new FollowersMail(auth()->user()));

        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user);

        return redirect()->back();
    }

}