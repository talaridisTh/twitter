<?php

namespace App\Http\Middleware;

use App\Models\Visits;
use Closure;
use Illuminate\Http\Request;

class PageVisitsMiddleware {

    /**
     * Save every page
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && request()->isMethod('get')) {
            Visits::create([
                "user_id" => auth()->id(),
                "path" => $request->path(),
            ]);
        }

        return $next($request);
    }

}