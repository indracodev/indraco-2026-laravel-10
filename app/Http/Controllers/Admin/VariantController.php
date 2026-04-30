<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variant;
use Illuminate\Support\Str;

class VariantController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $variants = Variant::when($search, function($query) use ($search) {
                $query->where('variant_name', 'like', "%{$search}%")
                      ->orWhere('slug', 'like', "%{$search}%");
            })
            ->latest()
            ->get();
            
        return view('admin.variants.index', compact('variants', 'search'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'taste' => 'nullable|string|max:255',
            'acidity' => 'nullable|numeric|min:0|max:10',
            'body' => 'nullable|numeric|min:0|max:10',
            'roast' => 'nullable|string|max:255',
            'ingredient' => 'nullable|string|max:255',
        ]);
        
        $data['slug'] = Str::slug($data['name']);
        
        Variant::create($data);
        return redirect()->back()->with('success', 'Varian berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $variant = Variant::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'taste' => 'nullable|string|max:255',
            'acidity' => 'nullable|numeric|min:0|max:10',
            'body' => 'nullable|numeric|min:0|max:10',
            'roast' => 'nullable|string|max:255',
            'ingredient' => 'nullable|string|max:255',
        ]);
        
        $data['slug'] = Str::slug($data['name']);
        
        $variant->update($data);
        return redirect()->back()->with('success', 'Varian berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $variant = Variant::findOrFail($id);
        $variant->delete();
        return redirect()->back()->with('success', 'Varian berhasil dihapus.');
    }
}
