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
        $allBrands = Brand::where('status', 'active')->get();

        $brands = [
            'coffee'      => $allBrands->whereIn('slug', ['supresso', 'balicafe', 'ucafe', 'rasa-sayang', 'tugu-buaya', 'uang-emas', 'hao-cafe']),
            'ginger'      => $allBrands->whereIn('slug', ['jaheku']),
            'coconut_milk'=> $allBrands->whereIn('slug', ['intirasa']),
            'cocoa'       => $allBrands->whereIn('slug', ['brochoco']),
        ];

        $banners = \App\Models\Banner::where('is_active', true)->orderBy('order_num')->get();
        return view('products.index', compact('brands', 'banners'));
    }

    public function indraco($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();

        // Handle search query if present
        $search = request('q');
        if ($search) {
            $products = Product::where('merek_id', $brand->id)
                ->where('nama_produk', 'LIKE', "%{$search}%")
                ->where('status', 'active')
                ->where('is_deleted', 0)
                ->get();
            dd($products);
            return view('products.brand_standard', [
                'brand'        => $brand,
                'products'     => $products,
                'is_search'    => true,
                'search_query' => $search
            ]);
        }

        // Standard logic: list all products for this brand
        $products = Product::where('merek_id', $brand->id)
            ->where('status', 'active')
            ->where('is_deleted', 0)
            ->orderBy('id', 'asc')
            ->get();

        return view('products.brand_standard', compact('brand', 'products'));
    }

    public function supresso($slug)
    {
        // Supresso/Kraton uses Collection -> Type -> Variant structure
        // Fallback to brand ID 8 (supresso) if slug not found — same as legacy PHP
        $brand = Brand::where('slug', $slug)
            ->orWhere('slug', 'LIKE', $slug . '%')
            ->first();

        if (!$brand) {
            $brand = Brand::find(8);
            if (!$brand) abort(404);
        }

        $collectionId = request('col');

        $collections = Collection::where('merek_id', $brand->id)
            ->where('status', 'active')
            ->orderBy('id', 'asc')
            ->get();

        // Default to first collection
        if (!$collectionId && $collections->isNotEmpty()) {
            $collectionId = $collections->first()->id;
        }

        // Find current collection to determine if it's Kraton
        $currentCollection = $collections->firstWhere('id', $collectionId);
        $isKraton = $currentCollection
            ? (strtolower($currentCollection->collection_name) === 'kraton')
            : (str_contains(strtolower($brand->slug), 'kraton'));

        // Fetch variants via JOIN through master_type — same logic as legacy PHP
        $variants = collect();
        if ($collectionId) {
            $variants = Variant::whereHas('type', function ($query) use ($collectionId) {
                $query->where('collection_id', $collectionId);
            })
            ->where('status', 'active')
            ->orderByRaw('ISNULL(sort_order), sort_order ASC, id ASC')
            ->get();

            // Eager load only active products, ordered by id
            $variants->load(['products' => function ($query) {
                $query->where('status', 'active')
                      ->where('is_deleted', 0)
                      ->orderBy('id', 'asc');
            }]);
        }

        return view('products.brand_supresso', compact(
            'brand', 'collections', 'variants', 'collectionId', 'isKraton'
        ));
    }
}
