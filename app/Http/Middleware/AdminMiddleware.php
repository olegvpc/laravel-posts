<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Auth\Access\AuthorizationException;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isAdmin($request)) {
            return $next($request);
        }
//        abort(403); // возвращает ошибку 403 FORBIDDEN
        throw new AuthorizationException(); // 403 THIS ACTION IS UNAUTHORIZED.

    }

    protected function isAdmin(Request $request){
            // $user = $request->user();
            // return $user->active;
            return false;
        }
}
