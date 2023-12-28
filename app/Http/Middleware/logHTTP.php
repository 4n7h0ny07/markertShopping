<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class logHTTP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!str_contains(request()->url(), 'admin/compass')){
            try {
                //codigo de..
                $data = [
                    'user_id' => Auth::user()->id,
                    'neme' => Auth::user()->name,
                    'url' => request()->getRequestUri(),
                    'method' => request()->method(),
                    'input' => request()->except(['password' ,'_token', 'method']),
                ];
                log::channel('requests')->info('Petition HTTP al Sistema', $data);

            } catch (\Throwable $th) {
                //throw $th;
                $data = [
                    'url' => request()->getRequestUri(),
                    'method' => request()->method(),
                    'input' => request()->except(['password', '_token', '_method']),
                ];
                log::channel('requests')->info('Petition HTTP al Sistema', $data);
            }
        }
        return $next($request);
    }
}
