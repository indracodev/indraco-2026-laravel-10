<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'id' => 1,
                'name' => 'Tugu Buaya',
                'slug' => 'tugu-buaya',
                'description' => 'Bercita rasa kuat serta tekstur tegas. Dikembangkan sejak 1977, Tugu Buaya memiliki rasa yang unik dengan karakter kopi yang diterima semua orang.',
                'status' => 'active',
            ],
            [
                'id' => 2,
                'name' => 'Uang Emas',
                'slug' => 'uang-emas',
                'description' => 'Dibuat dari biji kopi pilihan, cobalah kopi asli dengan paduan metode pengolahan tradisional dan modern ini. Dari kreasi kopi hitam yang sesungguhnya, temukan nuansa kontemporer yang tiada duanya.',
                'status' => 'active',
            ],
            [
                'id' => 3,
                'name' => 'Rasa Sayang',
                'slug' => 'rasa-sayang',
                'description' => 'Diracik pada 1984 dengan rasa dan aroma nostalgia, Rasa sayang membawa penghormatan bagi kopi di masa lalu, sekaligus memupuk rasa nostalgia yang semakin hangat dengan teknik presisi yang lebih baru.',
                'status' => 'active',
            ],
            [
                'id' => 8,
                'name' => 'Supresso',
                'slug' => 'supresso',
                'logo_path' => 'images/uploads/brand/supresso_1773886613.png',
                'description' => 'Dengan biji-biji kopi yang berasal dari timur hingga barat Indonesia, koleksi kopi single-origin Supresso menghasilkan profil rasa yang premium, mewah sekaligus unik. Dengan sepenuh hati, kami fokus menyajikan kopi kualitas tinggi untuk penikmat kopi di seluruh dunia dalam bentuk biji, bubuk, drip, dan kapsul. Nikmati pengalaman kopi Indonesia dalam kualitas dan kemurniannya, bersama Supresso.',
                'status' => 'active',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(['id' => $brand['id']], $brand);
        }
    }
}
