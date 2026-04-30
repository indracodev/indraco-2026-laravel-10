<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $settings = \App\Models\Setting::when($search, function($query) use ($search) {
            $query->where('setting_key', 'like', "%{$search}%")
                  ->orWhere('setting_value', 'like', "%{$search}%");
        })->get();
        
        return view('admin.settings.index', compact('settings', 'search'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'setting_key' => 'required|string|max:255|unique:master_settings,setting_key',
            'setting_value' => 'nullable|string',
        ]);
        
        \App\Models\Setting::create($data);
        return redirect()->back()->with('success', 'Pengaturan berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $setting = \App\Models\Setting::where('setting_key', $id)->firstOrFail();
        $data = $request->validate([
            'setting_key' => 'required|string|max:255|unique:master_settings,setting_key,'.$id.',setting_key',
            'setting_value' => 'nullable|string',
        ]);
        
        $setting->update($data);
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $setting = \App\Models\Setting::where('setting_key', $id)->firstOrFail();
        $setting->delete();
        return redirect()->back()->with('success', 'Pengaturan berhasil dihapus.');
    }
}
