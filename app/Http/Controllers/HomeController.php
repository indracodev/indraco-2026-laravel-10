<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch banners and brands for the homepage
        $banners = Banner::where('is_active', true)->orderBy('order_num')->get();
        $brands = Brand::where('status', 'active')->get();
        
        // Fetch settings for banner
        $settings = Setting::whereIn('setting_key', ['banner_type', 'banner_value'])->pluck('setting_value', 'setting_key');
        $banner_type = $settings['banner_type'] ?? 'youtube';
        $banner_value = $settings['banner_value'] ?? 'ePqLLciPHKg';

        return view('home', compact('banners', 'brands', 'banner_type', 'banner_value'));
    }
}
