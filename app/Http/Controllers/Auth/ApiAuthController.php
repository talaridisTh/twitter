<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\Visits;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller {

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {

        $user = User::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Bad credential',
            ], 401);
        }
        $token = $user->createToken($user->email)->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function users()
    {
        $response = Cache::remember('users', 60, function () {
            return User::all()->map(fn($user) => [
                'username' => $user->username,
                'email' => $user->email,
                'total followers' => $user->countFollowers(),
                'total following' => $user->countFollowing(),
                'total tweets posted' => $user->countPosts(),
                'link to user’s profile' => route("user.profile", $user->slug),
                'link to the user’s avatar' => asset($user->photo),
            ]);
        });

        return response()->json($response);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function statistics()
    {
        $paths = Visits::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->pluck("path")->unique();
        $response = Cache::remember('statistics', 60, function () use ($paths) {
            return $paths->map(fn($path) => [
                "path" => $path,
                "total visits" => Visits::where("path", $path)->count(),
                "username with the most visits" => User::find(Visits::select(DB::raw('count(*) as s, user_id'))
                    ->where("path", $path)
                    ->groupBy('user_id')->orderBy("s", "desc")
                    ->limit(1)
                    ->pluck("user_id"))
                    ->first()->username,
            ]);
        });

        return response()->json($response);
    }

}