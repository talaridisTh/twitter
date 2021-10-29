<?php

namespace App\Http\Repositories;

use App\Mail\FollowersMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class FollowRepository {

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function follow(User $user): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->follow($user);
        Mail::to($user->email)->queue(new FollowersMail(auth()->user()));

        return redirect()->back();
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unfollow(User $user): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->Unfollow($user);

        return redirect()->back();
    }

}