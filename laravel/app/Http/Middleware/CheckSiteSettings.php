<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSiteSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isSetup = SiteSetting::count() > 0;
        $isSetupRoute = $request->is("setup*");

        if ($isSetup && $isSetupRoute) {
            return redirect()->route("home");
        }

        if (!$isSetup && !$isSetupRoute) {
            return redirect()->route("setup.index");
        }

        return $next($request);
    }
}
