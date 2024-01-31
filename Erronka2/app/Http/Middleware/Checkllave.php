<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Juego;
use Illuminate\Support\Facades\Auth;

class Checkllave
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $game = Juego::find($request->id);
        $llave_valor = $game->llave;

        if (!$game || $llave_valor === 0) {
            return redirect()->route('welcome')->with('alert', 'No intentes hacer trampa');
        }

        return $next($request);
    }
}
