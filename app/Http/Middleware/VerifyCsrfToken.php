<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;
use Route;
use Illuminate\Session\TokenMismatchException;
//use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {
        $route = Route::getRoutes()->match($request);
        $routeAction = $route->getAction();
        if (isset($routeAction['nocsrf']) && $routeAction['nocsrf']) {
            return $next($request);
        }
        //return parent::handle($request, $next);
        try
        {
            return parent::handle($request, $next);
        }
        catch(TokenMismatchException $e)
        {
            return redirect()->back()->withError('Token Mismatch !! Have you been away? Please try submitting the form afresh !')->withInput()->withErrors(['tokenMismatch' => 'Have you been away? Please try submitting the form again!']);
        }
    }

}
