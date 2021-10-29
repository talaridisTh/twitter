<?php

namespace App\Models;

use App\Traits\HasFollow;
use App\Traits\HasImage;
use App\Traits\HasSlug;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

    use HasApiTokens, HasFactory, Notifiable, HasSlug, HasImage, HasFollow;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'media_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->latest();
    }

    public function visits()
    {
        return $this->hasMany(Visits::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class, "media_id");
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }

    public function countPosts()
    {
        return $this->posts()->where('user_id', $this->id)->count();
    }

    public function getPhotoAttribute()
    {
        return $this->media?->path ?? "/image/guest-user.jpg";
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
