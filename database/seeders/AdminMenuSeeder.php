<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['title' => 'Dashboard', 'url' => 'admin', 'icon' => 'bi bi-speedometer2', 'order' => 1, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin', 'markom']],
            ['title' => 'Kategori', 'url' => 'admin/categories', 'icon' => 'bi bi-tags', 'order' => 2, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin']],
            ['title' => 'Merek', 'url' => 'admin/brands', 'icon' => 'bi bi-shop', 'order' => 3, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin']],
            ['title' => 'Produk Kompleks', 'url' => 'admin/collections', 'icon' => 'bi bi-collection', 'order' => 4, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin']],
            ['title' => 'Tipe', 'url' => 'admin/types', 'icon' => 'bi bi-diagram-2', 'order' => 5, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin']],
            ['title' => 'Varian', 'url' => 'admin/variants', 'icon' => 'bi bi-grid-3x3', 'order' => 6, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin']],
            ['title' => 'Produk', 'url' => 'admin/products', 'icon' => 'bi bi-box-seam', 'order' => 7, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin']],
            ['title' => 'Berita', 'url' => 'admin/news', 'icon' => 'bi bi-newspaper', 'order' => 8, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin', 'markom']],
            ['title' => 'Banner', 'url' => 'admin/banners', 'icon' => 'bi bi-card-image', 'order' => 9, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin', 'markom']],
            ['title' => 'Kontak Masuk', 'url' => 'admin/contacts', 'icon' => 'bi bi-envelope-paper', 'order' => 10, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin']],
            ['title' => 'Manajemen Asset', 'url' => 'admin/assets', 'icon' => 'bi bi-images', 'order' => 11, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'admin']],
            ['title' => 'Pengaturan', 'url' => 'admin/settings', 'icon' => 'bi bi-gear', 'order' => 12, 'type' => 'menu', 'roles_allowed' => ['superadmin']],
            ['title' => 'Teks Halaman', 'url' => 'admin/translations', 'icon' => 'bi bi-translate', 'order' => 13, 'type' => 'menu', 'roles_allowed' => ['superadmin', 'markom']],
            ['title' => 'Manajemen Menu', 'url' => 'admin/menus', 'icon' => 'bi bi-list-nested', 'order' => 14, 'type' => 'menu', 'roles_allowed' => ['superadmin']],
            ['title' => 'Manajemen User', 'url' => 'admin/users', 'icon' => 'bi bi-people', 'order' => 15, 'type' => 'menu', 'roles_allowed' => ['superadmin']],
        ];

        foreach ($menus as $menu) {
            \App\Models\AdminMenu::updateOrCreate(['url' => $menu['url']], $menu);
        }
    }
}
