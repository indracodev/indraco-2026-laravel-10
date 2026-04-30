<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product-indraco/{slug}', [ProductController::class, 'indraco'])->name('product.indraco');
Route::get('/product-supresso/{slug}', [ProductController::class, 'supresso'])->name('product.supresso');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Subscription
Route::post('/subscribe', [\App\Http\Controllers\SubscriptionController::class, 'store'])->name('subscribe');

// Localization
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Static / Content Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/businesses', [PageController::class, 'businesses'])->name('businesses');
Route::get('/stores', [PageController::class, 'stores'])->name('stores');
Route::get('/download', [PageController::class, 'download'])->name('download');
Route::get('/career', [PageController::class, 'career'])->name('career');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/equipment', [PageController::class, 'equipment'])->name('equipment');
Route::get('/foodservice', [PageController::class, 'foodservice'])->name('foodservice');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

// Prefix Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->middleware('guest');
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        
        Route::resource('variants', \App\Http\Controllers\Admin\VariantController::class)->except(['create', 'edit', 'show']);
        Route::resource('types', \App\Http\Controllers\Admin\TypeController::class)->except(['create', 'edit', 'show']);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except(['create', 'edit', 'show']);
        Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class)->except(['create', 'edit', 'show']);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except(['create', 'edit', 'show']);
        Route::resource('collections', \App\Http\Controllers\Admin\CollectionController::class)->except(['create', 'edit', 'show']);
        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class)->except(['create', 'edit', 'show']);
        Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class)->except(['create', 'edit', 'show']);
        Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class)->except(['create', 'edit', 'show']);
        Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index', 'destroy']);
        Route::get('assets', [\App\Http\Controllers\Admin\AssetController::class, 'index'])->name('admin.assets.index');
        Route::post('assets/upload', [\App\Http\Controllers\Admin\AssetController::class, 'upload'])->name('admin.assets.upload');
        Route::post('assets/settings', [\App\Http\Controllers\Admin\AssetController::class, 'updateSettings'])->name('admin.assets.settings');
        Route::delete('assets/delete', [\App\Http\Controllers\Admin\AssetController::class, 'destroy'])->name('admin.assets.destroy');
        Route::post('menus/reorder', [\App\Http\Controllers\Admin\AdminMenuController::class, 'reorder'])->name('menus.reorder');
        Route::resource('menus', \App\Http\Controllers\Admin\AdminMenuController::class)->except(['create', 'edit', 'show']);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->except(['create', 'edit', 'show']);
        
        Route::get('users/impersonate/{id}', [\App\Http\Controllers\Admin\UserController::class, 'impersonate'])->name('admin.users.impersonate');
        Route::get('users/impersonate-leave', [\App\Http\Controllers\Admin\UserController::class, 'leaveImpersonate'])->name('admin.users.impersonate.leave');

        // Translations Management Route
        Route::get('translations', [\App\Http\Controllers\Admin\TranslationController::class, 'index']);
        Route::put('translations', [\App\Http\Controllers\Admin\TranslationController::class, 'update']);
    });
});
