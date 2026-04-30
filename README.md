# Indraco 2026 - Laravel Migration Project

Proyek ini adalah migrasi dari website Indraco 2026 (Vanilla PHP) ke framework Laravel 10.

## 🚦 Route Comparison Analysis

Berdasarkan referensi dari `indraco-2026-php/route-url.md`, berikut adalah status implementasi route pada versi Laravel saat ini:

### 🌐 Halaman Publik (Frontend)

| Status | Route PHP Vanilla | Route Laravel | Keterangan |
| :---: | :--- | :--- | :--- |
| ✅ | `index.php` | `/` | Sudah diimplementasikan di `HomeController` |
| ✅ | `about.php` | `/about` | Selesai migrasi konten & animasi |
| ✅ | `product.php` | `/products` | Selesai (Daftar Produk) |
| ✅ | `product-indraco.php?slug={s}` | `/product-indraco/{slug}` | Selesai (Layout Standard) |
| ✅ | `product-supresso-bali.php?slug={s}`| `/product-supresso/{slug}` | Selesai (Layout Complex Supresso) |
| ✅ | `businesses.php` | `/businesses` | Selesai migrasi konten |
| ✅ | `news.php` | `/news` | Selesai (Pagination & List) |
| ✅ | `news-detail.php?slug={s}` | `/news/{slug}` | Selesai (Detail News) |
| ✅ | `stores.php` | `/stores` | Selesai migrasi konten |
| ✅ | `download.php` | `/download` | Selesai migrasi konten |
| ✅ | `career.php` | `/career` | Selesai migrasi konten |
| ✅ | `contact.php` | `/contact` | Selesai migrasi konten & form |
| ✅ | `equipment.php` | `/equipment` | Selesai migrasi konten |
| ✅ | `foodservice.php` | `/foodservice` | Selesai migrasi konten |
| ✅ | `privasi.php` | `/privacy` | Selesai migrasi konten |
| ✅ | `terms.php` | `/terms` | Selesai migrasi konten |

### 🔐 Halaman Admin (Backend - Filament v3)

| Status | Deskripsi | Route Laravel | Keterangan |
| :---: | :--- | :--- | :--- |
| ✅ | Admin Dashboard | `/admin` | Selesai (Filament Dashboard) |
| ✅ | Manajemen Merek | `/admin/brands` | CRUD Merek & Banner |
| ✅ | Manajemen Produk | `/admin/products` | CRUD Produk Utama |
| ✅ | Produk Kompleks | `/admin/collections` | CRUD Koleksi, Tipe, Varian |
| ✅ | Manajemen Berita | `/admin/news` | CRUD Berita & Artikel |
| ✅ | Banner Carousel | `/admin/banners` | CRUD Banner Home Page |
| ✅ | Pengaturan Site | `/admin/settings` | Manajemen Key-Value Settings |

---

## 🛠️ Tech Stack
- **Framework:** Laravel 10
- **Database:** MySQL (Shared with PHP version)
- **Frontend Assets:** Vite, Bootstrap 5, GSAP (ScrollTrigger)
- **Architecture:** Blade Templating with View Composers

## 🚀 How to Run
1. Konfigurasi `.env` (Database `db_indraco_new_2026`).
2. Jalankan `composer install`.
3. Jalankan `php artisan migrate` (untuk tabel sistem Laravel).
4. Jalankan `php artisan db:seed --class=BrandSeeder`.
5. Jalankan `php artisan serve`.

---
*Dokumentasi diperbarui otomatis oleh Antigravity AI pada 2026-04-27*
