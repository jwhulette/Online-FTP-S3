<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\LoginHandler;

class ApplyLoginData
{
    /**
     * Apply the login data from the session storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (true === \Session::get('loggedIn', false)) {
            $login = new LoginHandler();
            $login->apply();
        }

        return $next($request);
    }
}
