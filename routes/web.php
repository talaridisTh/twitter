<?php

use App\Http\Controllers\PostsController;
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
Route::middleware('auth')->group(function () {
    Route::get("/timeline", [PostsController::class, "index"])->name('timeline');
    Route::get("/post/create", [PostsController::class, "create"])->name('post.create');
    Route::post("/post", [PostsController::class, "store"])->name('post.store');
});
require __DIR__ . '/auth.php';
