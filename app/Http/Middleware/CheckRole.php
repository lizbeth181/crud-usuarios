<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle($request, \Closure $next, string $role)
{
    // Si el usuario no está logueado o su rol no coincide con el requerido...
    if (!$request->user() || $request->user()->role !== $role) {
        // Redirigir al dashboard con un mensaje de error
        return redirect('/dashboard')->with('error', 'No tienes permisos de administrador.');
    }

    return $next($request);
}
}
