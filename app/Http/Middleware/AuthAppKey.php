<?php
/**
 * Copyright (c) 2020 ibeta.me
 * User: Jacky
 * Class: HasPower.php
 * Description:
 * Date: 2020/01/02
 * Time: 5:50 下午
 */

namespace App\Http\Middleware;

use Closure;

class AuthAppKey
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param integer $power
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->app_key == env('APP_KEY')) {
            return $next($request);
        }
        return response()->json(['message'=>'Forbidden'], 403);
    }
}
