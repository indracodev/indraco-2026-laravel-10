<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::with('parent')
            ->when($search, function($query) use ($search) {
                $query->where('nama_kategori', 'like', "%{$search}%")
                      ->orWhere('slug', 'like', "%{$search}%");
            })
            ->orderBy('urutan')
            ->latest()
            ->get();
            
        $parentCategories = Category::whereNull('parent_id')->get();
        
        return view('admin.categories.index', compact('categories', 'search', 'parentCategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'parent_id' => 'nullable|exists:master_kategori,id',
            'icon_path' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);
        $data['slug'] = Str::slug($data['name']);
        if (!$request->filled('order')) {
            $data['order'] = 0;
        }
        
        Category::create($data);
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'parent_id' => 'nullable|exists:master_kategori,id',
            'icon_path' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);
        
        // Prevent self-parenting
        if ($data['parent_id'] == $id) {
            return redirect()->back()->with('error', 'Kategori tidak dapat menjadi induk bagi dirinya sendiri.');
        }

        $data['slug'] = Str::slug($data['name']);
        if (!$request->filled('order')) {
            $data['order'] = 0;
        }
        
        $category->update($data);
        return redirect()->back()->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        // Set null to children if any
        Category::where('parent_id', $category->id)->update(['parent_id' => null]);
        
        $category->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
