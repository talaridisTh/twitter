<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {

    public function run()
    {
        User::factory()
            ->hasPosts(7)
            ->hasFollowing(3)
            ->hasFollowers(6)
            ->create([
            'username' => "thanos",
            'slug' => "thanos",
            'email' => "talaridis@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'remember_token' => Str::random(10),
        ]);

        User::factory()
            ->count(10)
            ->hasPosts(3)
            ->hasFollowing(1)
            ->hasFollowers(1)
            ->create();
    }

}
