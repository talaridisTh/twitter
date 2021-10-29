<?php

namespace App\Traits;
/**
 * Follow Unfollow system
 */
trait  HasFollow {

    /**
     * @param $user
     * @return void
     */
    public function follow($user): void
    {
        $this->following()->attach($user);
    }

    /**
     * @param $user
     * @return void
     */
    public function Unfollow($user): void
    {
        $this->following()->detach($user);
    }

    /**
     * Get count followers
     * @return int
     */
    public function countFollowers(): int
    {
        return $this->followers()->where('following_user_id', $this->id)->count();
    }

    /**
     * Get count followers
     * @return int
     */
    public function countFollowing(): int
    {
        return $this->following()->where('user_id', $this->id)->count();
    }

    /**
     * Get if is followers
     * @return string
     */
    public function isFollowing(): string
    {
        return auth()->user()->following()
            ->where('following_user_id', $this->id)
            ->exists() ? "unfollow" : "follow";

    }

    /**
     * @param $query
     */
    public function scopeSortByFollowers($query)
    {
        $query->withCount("followers")
            ->orderBy('followers_count', 'desc');
    }

    /**
     * @param $query
     */
    public function scopeNotFollowMe($query)
    {
        $query->sortByFollowers()
            ->whereNotIn('id', [auth()->id()])
            ->whereNotIn("id", auth()->user()->following->pluck("id"));
    }

}