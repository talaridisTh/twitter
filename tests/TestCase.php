<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase {

    use CreatesApplication;

    protected function logIn()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        return $user;
    }

    protected function logInWithPost($post = 5)
    {
        $user = User::factory()->hasPosts($post)->create();
        $this->actingAs($user);

        return $user;
    }

    protected function createUser($post = 5)
    {
        $users = User::factory()->hasPosts($post)->create();

        return $users;
    }
    protected function createUsers($num = 1,$post = 5)
    {
        $users = User::factory()->count($num)->hasPosts($post)->create();

        return $users;
    }

}
