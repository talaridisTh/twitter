<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Media extends Model {

    use HasSlug;

    protected $guarded = [];

    public function setPathAttribute($value)
    {
        $this->attributes['path'] = "/".$value;
    }

}