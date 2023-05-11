<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Access\AuthorizationException;

class ActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isActive($request)) {
            return $next($request);
        }
        abort(403);
        // throw new AuthorizationException(); // 403 THIS ACTION IS UNAUTHORIZED.
    }
    // функция которая проверяет заблокирован ли данный пользователь
    protected function isActive(Request $request){
            // $user = $request->user();
            // return $user->active; // в базе есть свойство у каждого user - true / false
            return true;
        }

}
