<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Check the guard
        $guard = $this->getGuard($request);

        if ($guard === 'admin') {
            return route('admin.login');
        }

        return route('login');
    }

    protected function getGuard(Request $request)
    {
        // Extract guard from middleware
        $middleware = $request->route()?->middleware();

        foreach ($middleware as $m) {
            if (str_starts_with($m, 'auth:')) {
                return explode(':', $m)[1] ?? 'web';
            }
        }

        return 'web';
    }
}
