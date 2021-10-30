<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FollowRepository;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends FollowRepository {

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("timeline", [
            "posts" => Post::with("user")
                ->whereIn("user_id", auth()->user()->following->pluck("id"))
                ->orderByDesc('created_at')->paginate(5),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("post.store");
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostRequest $request)
    {
        $post = $request->store();

        return redirect(route('timeline'))->with('success', "$post->name created successful");
    }

}