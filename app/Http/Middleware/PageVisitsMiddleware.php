<?php

namespace App\Http\Middleware;

use App\Models\Visits;
use Closure;
use Illuminate\Http\Request;

class PageVisitsMiddleware {

    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            Visits::create([
                "user_id" => auth()->id(),
                "path" => $request->path(),
            ]);
        }
        return $next($request);
    }

}