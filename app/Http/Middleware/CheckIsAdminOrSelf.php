<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminOrSelf
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $requestedUserID = $request->route()->parameter('id');

        if(Auth::user()->user_role_id === 1 || Auth::user()->id == $requestedUserID){
            return $next($request);
        }else{
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
