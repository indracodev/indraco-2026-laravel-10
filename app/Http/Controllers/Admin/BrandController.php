<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $brands = \App\Models\Brand::when($search, function($query) use ($search) {
            $query->where('nama_merek', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        })->latest()->get();
        
        return view('admin.brands.index', compact('brands', 'search'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
        
        \App\Models\Brand::create($data);
        return redirect()->back()->with('success', 'Merek berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $brand = \App\Models\Brand::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
        
        $brand->update($data);
        return redirect()->back()->with('success', 'Merek berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $brand = \App\Models\Brand::findOrFail($id);
        $brand->delete();
        return redirect()->back()->with('success', 'Merek berhasil dihapus.');
    }
}
