<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Spatie\Permission\Traits\HasRoles;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    use HasRoles;
    public function handle(Request $request, Closure $next): Response
    {   
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $role = $user->roles->first()->name ?? 'unknown';

        $roleRoutes = [
            'admin' => ['admin.*', 'users.*', 'tickets.*'],
            'technicien' => ['tickets.*'],
            'client' => ['home', 'tickets.create', 'tickets.store', 'tickets.show'],
        ];

        $currentRoute = $request->route()->getName();

        $allowed = collect($roleRoutes[$role] ?? [])
            ->contains(fn ($pattern) => fnmatch($pattern, $currentRoute));


        if (!$allowed) {
                abort(403, 'Accès interdit.');
            }
        
        return $next($request);
    }
}
