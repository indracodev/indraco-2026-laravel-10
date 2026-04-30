<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $types = Type::when($search, function($query) use ($search) {
                $query->where('type_name', 'like', "%{$search}%")
                      ->orWhere('slug', 'like', "%{$search}%");
            })
            ->latest()
            ->get();
            
        return view('admin.types.index', compact('types', 'search'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);
        $data['slug'] = Str::slug($data['name']);
        
        Type::create($data);
        return redirect()->back()->with('success', 'Tipe berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $type = Type::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);
        
        $data['slug'] = Str::slug($data['name']);
        
        $type->update($data);
        return redirect()->back()->with('success', 'Tipe berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return redirect()->back()->with('success', 'Tipe berhasil dihapus.');
    }
}
