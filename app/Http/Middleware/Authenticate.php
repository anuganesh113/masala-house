<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * class Authenticate
 */
class Authenticate extends Middleware
{
    /**
     * @var string
     */
    protected $admin_login = 'admin';

    /**
     * @var string
     */
    protected $index = '/';

    protected function redirectTo($request)
    {

        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], ResponseAlias::HTTP_UNAUTHORIZED);
        }

        if ($request->is('admin') || $request->is('admin/*')) {
            return $this->admin_login;
        } else {
            return $this->index;
        }

    }
}
