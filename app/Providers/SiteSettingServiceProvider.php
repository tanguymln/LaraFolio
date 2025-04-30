<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteSettingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */ public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $siteName = SiteSetting::where("key", "site_name")->value("value") ?? config("app.name");
        $siteLogo = SiteSetting::where("key", "site_logo")->value("value") ?? null;

        View::share("siteName", $siteName);
        View::share("siteLogo", $siteLogo);
    }
}
