<?php

namespace App\Providers;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('site_settings')) {
            $siteName = SiteSetting::where('key', 'site_name')->value('value') ?? config('app.name');
            $siteLogo = SiteSetting::where('key', 'site_logo')->value('value') ?? null;
            $ownerEmail = SiteSetting::where('key', 'owner_email')->value('value') ?? null;
        } else {
            $siteName = config('app.name');
            $siteLogo = null;
            $ownerEmail = null;
        }
        $isRegistered = Schema::hasTable('users') ? User::count() > 0 : false;

        View::share('siteName', $siteName);
        View::share('siteLogo', $siteLogo);
        View::share('isRegistered', $isRegistered);
        View::share('ownerEmail', $ownerEmail);
    }
}
