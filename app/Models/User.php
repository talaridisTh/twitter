<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
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

//    TODO: make all following system repository (Pro level refactor)
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }

    public function follow($user)
    {
        return $this->following()->attach($user);
    }

    public function Unfollow($user)
    {
        return $this->following()->detach($user);
    }

    public function isFollow($user)
    {
        return $this->following()->where('following_user_id', $user->id)->exists();
    }

    public function countFollowers()
    {
        return $this->followers()->where('following_user_id', $this->id)->count();
    }

    public function countFollowing()
    {
        return $this->following()->where('user_id', $this->id)->count();
    }

    public function isFollowing()
    {
        return auth()->user()->following()
            ->where('following_user_id', $this->id)
            ->exists() ? "unfollow" : "follow";

    }

    public function scopeSortByFollowers($query)
    {
        $query->withCount("followers")
            ->orderBy('followers_count', 'desc');
    }

//    TODO: make all following system repository (Pro level refactor)
    public function countPosts()
    {
        return $this->posts()->where('user_id', $this->id)->count();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
