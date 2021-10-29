<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model {

    use HasFactory, HasImage;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class, "media_id");
    }

    public function getPhotoAttribute()
    {
        return $this->media?->path;
    }

    public function getCreatedAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

}