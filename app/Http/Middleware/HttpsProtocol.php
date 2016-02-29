<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Redirect;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        if (!$request->isSecure() ) {
            $request->setTrustedProxies( [ $request->getClientIp() ] );
            return redirect($request->getRequestUri(),302,[],true);
        }

        return $next($request);
    }
}