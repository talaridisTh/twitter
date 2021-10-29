<?php

namespace Tests\Feature;

use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class TwitterTest extends TestCase {

    use RefreshDatabase;

    /**
     * A basic test Aplication.
     *
     * @return void
     */
    /** @test */
    public function test_timeline_screen_can_be_rendered()
    {
        $user = $this->logIn();
        $user->get('/timeline');
        $response = $this->get('/timeline');
        $response->assertStatus(200);
    }

    /** @test */
    public function test_my_profile_screen_can_be_rendered()
    {
        $user = $this->logIn();
        $user->get('/timeline');
        $response = $this->get('/profile/' . $user->slug);
        $response->assertStatus(200);
    }

    /** @test */
    public function test_user_list_screen_can_be_rendered()
    {
        $user = $this->logIn();
        $user->get('/timeline');
        $response = $this->get('/user-list');
        $response->assertStatus(200);
    }

    /** @test */
    public function test_can_follow_a_user()
    {
        $authUser = $this->logIn();
        $user = $this->createUser();
        $authUser->follow($user);
        $this->assertEquals($authUser->countFollowing(), 1);

    }

    /** @test */
    public function test_has_a_follower()
    {
        $authUser = $this->logIn();
        $user = $this->createUser();
        $user->follow($authUser);
        $this->assertEquals($authUser->countFollowers(), 1);
    }

    /** @test */
    public function test_count_posts()
    {
        $authUser = $this->logInWithPost(3);
        $this->assertEquals($authUser->countPosts(), 3);
    }

    /** @test */
    public function test_can_see_timeline_from_a_follower()
    {
        $authUser = $this->logIn();
        $user = $this->createUser();
        $authUser->follow($user);
        $postBody = $user->load("posts")->posts()->first()->body;
        $response = $this->get('/timeline');
        $response->assertSee($postBody);

    }

    /** @test */
    public function test_avatars_can_be_uploaded()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');
        $user = $this->logIn();
        $this->post('/upload/avatar', [
            'media' => $file,
        ]);
        $this->assertTrue($user->media->exists());

    }

    /** @test */
    public function test_post_image_can_be_uploaded()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');
        $user = $this->logIn();
        $post = Post::create([
            "body" => "foo",
            "user_id" => $user->id,
            "media_id" => (new Post())->saveImages(image: $file, width: 500, height: 250),
        ]);
        $this->assertTrue($post->media->exists());

    }

}
