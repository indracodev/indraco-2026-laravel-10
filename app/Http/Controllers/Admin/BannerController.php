<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $banners = \App\Models\Banner::when($search, function($query) use ($search) {
            $query->where('title_id', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%");
        })->orderBy('order_num')->get();
        
        return view('admin.banners.index', compact('banners', 'search'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_id' => 'required|string|max:255',
            'subtitle_en' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);
        $data['image_path'] = 'assets/img/hero/default.jpg'; // Placeholder
        
        \App\Models\Banner::create($data);
        return redirect()->back()->with('success', 'Banner berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $banner = \App\Models\Banner::findOrFail($id);
        $data = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_id' => 'required|string|max:255',
            'subtitle_en' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);
        if (!$request->has('is_active')) {
            $data['is_active'] = 0;
        }
        
        $banner->update($data);
        return redirect()->back()->with('success', 'Banner berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $banner = \App\Models\Banner::findOrFail($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner berhasil dihapus.');
    }
}
