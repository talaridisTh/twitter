<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile(User $user)
    {
        return view("user.profile", [
            "user" => $user,
            "posts" => Post::where("user_id", $user->id)->latest()->paginate(5),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function userList()
    {

        return view("user.user-list", [
            "users" => User::sortByFollowers()
                ->whereNotIn('id', [auth()->id()])
                ->paginate(5),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function avatar(Request $request)
    {
        auth()->user()->update([
            "media_id" => (new User())->saveImages(image: $request->media, width: 250, height: 250),
        ]);

        return redirect()->back();
    }

}