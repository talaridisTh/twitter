<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth',"visits"])->group(function () {
    Route::get("/timeline", [PostsController::class, "index"])->name('timeline');
    Route::get("/post/create", [PostsController::class, "create"])->name('post.create');
    Route::post("/post", [PostsController::class, "store"])->name('post.store');

    Route::get("/profile/{user}", [UsersController::class, "profile"])->name('user.profile');
    Route::post("/upload/avatar", [UsersController::class, "avatar"])->name('user.avatar');
    Route::get("/user-list", [UsersController::class, "userList"])->name('user.userList');

    Route::post("/follow/{user}", [FollowsController::class, "follow"])->name('follow');
    Route::post("/unfollow/{user}", [FollowsController::class, "unfollow"])->name('unfollow');


});
require __DIR__ . '/auth.php';
