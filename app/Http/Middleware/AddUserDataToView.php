<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddUserDataToView
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
        view()->share([
            'nik' => session('nik'),
            'name' => session('name'),
            'position' => session('position'),
            'foto' => session('foto')
        ]);

        return $next($request);
    }
}
