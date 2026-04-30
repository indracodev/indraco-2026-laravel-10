<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'desc');

        $news = \App\Models\News::when($search, function($query) use ($search) {
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('judul_eng', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        })
        ->orderBy($sort, $order)
        ->get();
        
        return view('admin.news.index', compact('news', 'search', 'sort', 'order'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:master_news,slug',
            'date_text' => 'nullable|string|max:100',
            'date_text_en' => 'nullable|string|max:100',
            'content' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/news'), $filename);
            $data['image_path'] = 'images/news/' . $filename;
        } else {
            $data['image_path'] = 'images/news-bg-4.webp'; // Default fallback
        }

        // Map to DB columns
        $data['judul'] = $data['title'];
        $data['judul_eng'] = $data['title_en'];
        $data['tanggal'] = $data['date_text'];
        $data['tanggal_eng'] = $data['date_text_en'];

        \App\Models\News::create($data);
        return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $news = \App\Models\News::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:master_news,slug,'.$id,
            'date_text' => 'nullable|string|max:100',
            'date_text_en' => 'nullable|string|max:100',
            'content' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists and not default
            if ($news->image_path && $news->image_path !== 'images/news-bg-4.webp' && file_exists(public_path($news->image_path))) {
                unlink(public_path($news->image_path));
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/news'), $filename);
            $data['image_path'] = 'images/news/' . $filename;
        }

        // Map to DB columns
        $data['judul'] = $data['title'];
        $data['judul_eng'] = $data['title_en'];
        $data['tanggal'] = $data['date_text'];
        $data['tanggal_eng'] = $data['date_text_en'];

        $news->update($data);
        return redirect()->back()->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $news = \App\Models\News::findOrFail($id);
        $news->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}
