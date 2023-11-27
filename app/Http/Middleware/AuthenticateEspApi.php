<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateEspApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Через заголовок Authorization: Bearer ......
        //Сравниваем токен с тем, что хранится в наших настройках. Здесь можно заменить логику на свою. Например сделать поиск токена в базе
        if($request->bearerToken() === 'naibacomuzpanbnppibwstvyroeymtlarmrslulqedyojxvxqlkofygipodb'){
            return $next($request);
        }
        return    \response('', 401);
    }

}
