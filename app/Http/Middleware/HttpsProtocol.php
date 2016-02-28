<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Redirect;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        if (!$request->secure() ) {
            $request->setTrustedProxies( [ $request->getClientIp() ] );
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}