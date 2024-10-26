<?php

namespace App\Providers;

use App\Models\Catogry;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingProvider extends ServiceProvider
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
        $setting=Setting::firstOr(function(){
            return Setting::create([
                "sitename" => "news",
                "favicon" => "deep",
                "logo" => "deep",
                "fecabook" => "",
                "instgram" => "fecabook.com",
                "twitter" => "twitter.com",
                "yotube" => "yotube.com",
                "country" => "egypt",
                "city" => "cairo",
                "street" => "el nour",
                "email" => "news@gm.com",
                "phone" => "12345678",
            ]);
        });

        view()->share(["setting"=>$setting]);
        view()->share(["catogries"=>Catogry::all()]);
    }
}




