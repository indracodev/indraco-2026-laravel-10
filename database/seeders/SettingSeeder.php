<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'logo_light', 'value' => 'images/logo-indraco-est-2.png'],
            ['key' => 'logo_dark', 'value' => 'images/logo-indraco-est-2-invert.png'],
            ['key' => 'banner_type', 'value' => 'youtube'],
            ['key' => 'banner_value', 'value' => 'ePqLLciPHKg'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
