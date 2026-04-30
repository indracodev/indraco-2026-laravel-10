<?php

namespace App\Http\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class SettingComposer
{
    public function compose(View $view)
    {
        $settings = Cache::remember('site_settings', 3600, function () {
            return Setting::pluck('setting_value', 'setting_key')->toArray();
        });

        $footer_brands = Cache::remember('footer_brands', 3600, function () {
            return \App\Models\Brand::where('status', 'active')->get();
        });

        $view->with('settings', $settings);
        $view->with('footer_brands', $footer_brands);
    }
}
