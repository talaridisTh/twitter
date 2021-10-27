<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {

    public function rules()
    {
        return [
            "body" => "required",
        ];
    }

    /**
     * @return mixed
     */
    public function store()
    {

        return Post::create([
            "body" => $this->body,
            "user_id" => auth()->id(),
        ]);

    }

    public function authorize()
    {
        return true;
    }

}