<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {

    public function rules()
    {
        return [
            "body" => "required|max:140",
            "media" => "image|mimes:jpeg,png,jpg,gif,svg|max:1024",
        ];
    }

    /**
     * Get post
     * @return mixed
     */
    public function store(): mixed
    {

        $post = Post::create([
            "body" => $this->body,
            "user_id" => auth()->id(),
            "media_id" => (new Post())->saveImages(image: $this->media, width: 500, height: 250),
        ]);

        return $post;
    }

    public function authorize()
    {
        return true;
    }

}