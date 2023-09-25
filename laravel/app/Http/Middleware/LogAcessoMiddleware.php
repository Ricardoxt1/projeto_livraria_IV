<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $logAcesso = new LogAcesso();

        $ip = $request->server->get('REMOTE_ADDR');
        $rote = $request->getRequestUri();
        $logAcesso->create(['log' => "IP: $ip - Rota: $rote"]);

        
        return $next($request);
    }
}
