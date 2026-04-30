<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $brands = Brand::where('status', 'active')->get();
        $banners = \App\Models\Banner::where('is_active', true)->orderBy('order_num')->get();
        return view('products.index', compact('brands', 'banners'));
    }

    public function indraco($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        
        // Handle search query if present
        $search = request('q');
        if ($search) {
            $products = Product::where('brand_id', $brand->id)
                ->where('nama_produk', 'LIKE', "%{$search}%")
                ->where('status', 'active')
                ->get();
            return view('products.brand_standard', [
                'brand' => $brand,
                'products' => $products,
                'is_search' => true,
                'search_query' => $search
            ]);
        }

        // Standard logic: list categories for this brand
        $categories = Category::where('slug', 'LIKE', "%{$slug}%")->get();
        if ($categories->isEmpty()) {
            $products = Product::where('brand_id', $brand->id)->where('status', 'active')->get();
        } else {
            $products = Product::whereIn('kategori_id', $categories->pluck('id'))->where('status', 'active')->get();
        }

        return view('products.brand_standard', compact('brand', 'products'));
    }

    public function supresso($slug)
    {
        // Supresso/Kraton uses Collection -> Type -> Variant structure
        $brand = Brand::where('slug', 'LIKE', "{$slug}%")->firstOrFail();
        
        $collectionId = request('col');
        $collections = Collection::where('merek_id', $brand->id)
            ->where('status', 'active')
            ->orderBy('id')
            ->get();

        if (!$collectionId && $collections->isNotEmpty()) {
            $collectionId = $collections->first()->id;
        }

        $variants = [];
        if ($collectionId) {
            $variants = Variant::whereHas('type', function($query) use ($collectionId) {
                $query->where('collection_id', $collectionId);
            })
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->with('products') // Eager load products
            ->get();
        }

        $isKraton = (str_contains(strtolower($brand->slug), 'kraton'));
        
        return view('products.brand_supresso', compact('brand', 'collections', 'variants', 'collectionId', 'isKraton'));
    }
}
