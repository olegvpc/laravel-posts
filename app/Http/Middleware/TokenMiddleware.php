<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $first, string $second): Response
    {
//        $token = 'secret';
        // $token = env('TOKEN'); // так лучше люч не передавать - т.к. после кэширования роутов env будт возвращать NULL
        $token = config('example.token');
//        dd($request->input('token'));
//        dd($request->all());
//        dd($request->server());
        // dump($request->server());
        info('log', ['token'=>$token]);
        dump($first, $second);

        if ($request->input('token') === $token) {
					// http://localhost/test?token=secret
//            dd('456'); // Print and STOP
// $request->all() - все параметры в запросе
// $request-> input() - один параметр в запросе
            return $next($request);
        }
        abort(403); // возвращает ошибку 403 FORBIDDEN
    }
}
