<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // before
        //info('Запрос', ['foo'=>'55555555']);
//        abort(403); // helper with code error 403 FORBIDDEN
        // dd($request->all());
        info('LOGING FROM LogMiddleware', [['HOST'=>$request->url()], ['REQ-PARAMS'=>$request->all()]]);
        return $next($request); // тут начего не происходит - отправляем запрос дальше


        //$responce = $next($request)
        //  // after
        //return $responce
    }
}
