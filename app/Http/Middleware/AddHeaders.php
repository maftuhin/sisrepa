<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Auth\Factory as Auth;

// If Laravel >= 5.2 then delete 'use' and 'implements' of deprecated Middleware interface.
class AddHeaders
{

    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $token = Session::get('token');
        if ($token != null) {
            $response->header('Authorization', $token);
        }
        $response->header('header name', 'header value');
        $response->header('another header', 'another value');

        return $response;
    }
}
