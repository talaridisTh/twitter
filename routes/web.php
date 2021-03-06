<?php


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
    Route::post("/follow/{user}", [PostsController::class, "follow"])->name('follow');
    Route::post("/unfollow/{user}", [PostsController::class, "unfollow"])->name('unfollow');

    Route::get("/profile/{user}", [UsersController::class, "profile"])->name('user.profile');
    Route::post("/upload/avatar", [UsersController::class, "avatar"])->name('user.avatar');
    Route::get("/user-list", [UsersController::class, "userList"])->name('user.userList');

});
require __DIR__ . '/auth.php';
