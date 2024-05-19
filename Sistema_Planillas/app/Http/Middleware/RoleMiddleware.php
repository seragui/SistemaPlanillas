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
        try {
            // Verificar si el usuario está autenticado mediante JWT
            $user = Auth::guard('api')->user();

            // Si el usuario no está autenticado, devolver error
            if (!$user) {
                return response()->json(['error' => 'No autenticado.'], 401);
            }

            // Si el rol está vacío o es falso, permitir el acceso
            if ($role == '' || $role == false) {
                return $next($request);
            }

            // Dividir los roles proporcionados en un array
            $roles = is_array($role) ? $role : explode('|', $role);

            // Verificar si el usuario tiene el rol requerido
            if (!$user->hasAnyRole($roles)) {
                return response()->json(['error' => 'No autorizado.'], 403);
            }

            return $next($request);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'El token ha expirado.'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'El token es inválido.'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'El token no fue provisto.'], 401);
        }
    }


}

