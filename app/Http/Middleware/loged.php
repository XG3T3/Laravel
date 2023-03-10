<?php

namespace App\Http\Middleware;

use Closure;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if(!Auth::guard('api')->check()){

            $response=[
                "success" => false,
                "message" => "unauthorized",
                "data" => null
            ];

            return response($response,401);
        }
        return $next($request);
    }
}
