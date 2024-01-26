<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Juego;
use Illuminate\Support\Facades\Auth;

class CheckGame
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

        if (!$game || $game->id_usuario != Auth::id()) {
            return redirect()->route('welcome')->with('alert', 'No tienes permiso para acceder esta partida');
        }

        return $next($request);
    }
}