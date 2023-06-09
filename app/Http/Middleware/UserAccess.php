<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$userTypes)
    {
        $user = $request->user();
      
        if ($user && $this->checkUserAccess($user->type, $userTypes)) {
            return $next($request);
        }

        return response()->view('pages.error.check-permission');
    }

    private function checkUserAccess($userType, $allowedTypes)
    {
        return in_array($userType, $allowedTypes);
    }
}
