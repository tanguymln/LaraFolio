<?php

namespace App\Providers;

use App\Models\Visit;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class LogVisitProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Event::listen(RouteMatched::class, function (RouteMatched $event) {
            $request = $event->request;

            if (!$request->isMethod('GET')) {
                return;
            }

            $prefix = optional($event->route)->getPrefix() ?: '';

            if (str_starts_with($prefix, 'api') || str_starts_with($prefix, 'dashboard')) {
                return;
            }

            if ($request->ip() === '127.0.0.1') {
                return;
            }

            Visit::create([
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent() ?? 'unknown',
                'route' => $request->path(),
            ]);
        });
    }
}
