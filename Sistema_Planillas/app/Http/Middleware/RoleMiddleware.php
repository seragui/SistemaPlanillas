<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
 
        if($role == '' || $role == false){
            return $next($request);
        }

        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return response()->json(['error' => 'No autenticado.'], 401);
        }

        $user = Auth::user();

        $roles = is_array($role)
            ? $role
            : explode('|', $role);
            
        // Verifica si el usuario tiene el rol requerido
        if (!$user->hasAnyRole($roles)) {
            return response()->json(['error' => 'No autorizado.'], 403);
        }
        
        return $next($request);
    }
}

