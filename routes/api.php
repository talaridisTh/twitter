<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Models\User;
use App\Models\Visits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("/login", [ApiAuthController::class, "login"])->name('api.login');
Route::middleware("auth:sanctum")->group(function () {
    Route::post("/users", [ApiAuthController::class, "users"])->name('api.users');
    Route::post("/statistics", [ApiAuthController::class, "statistics"])->name('api.statistics');
});
