<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @param  string[]  $guards
     * @return mixed
     *
     * @throws AuthenticationException
     */
    public function handle($request, $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        $response = $next($request);

        if ($this->shouldRedirect($request, $guards)) {
            return redirect()->guest(route('login'));
        }

        return $response;
    }

    /**
     * Determine if the request should redirect to the login page.
     *
     * @param  Request  $request
     * @return bool
     */
    protected function shouldRedirect($request, array $guards)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            return false;
        }

        return true;
    }
}
