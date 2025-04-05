<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

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
        Log::info('User role:', ['role' => $role]);

        $roleRoutes = [
            'admin' => ['filament.admin.*'],
            'technicien' => ['filament.technicien.*'],
            'employee' => ['filament.employe.*'],
            'unknown' => ['*'],
        ];

        $redirectRoutes = [
            'admin' => 'filament.admin.pages.dashboard',
            'technicien' => 'filament.technicien.pages.dashboard',
            'employee' => 'fliament.employee.dashboard',
            'unknown' => 'dashboard',
        ];

        $currentRoute = $request->route()->getName();
        Log::info('Current route:', ['route' => $currentRoute]);

        $allowed = collect($roleRoutes[$role] ?? [])
            ->contains(fn ($pattern) => fnmatch($pattern, $currentRoute));

        if (!$allowed) {
            session()->flash('error', 'Vous n\'êtes pas autorisé à accéder à cette section.');
            return redirect()->route($redirectRoutes[$role] ?? 'home');
        }

        return $next($request);
    }
}
