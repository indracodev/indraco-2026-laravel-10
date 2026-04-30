<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(9);
        return view('news.index', compact('news'));
    }

    public function show($slug)
    {
        $item = News::where('slug', $slug)->firstOrFail();
        return view('news.show', compact('item'));
    }
}
