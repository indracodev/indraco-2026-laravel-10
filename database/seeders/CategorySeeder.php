<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Level 0
            ['id' => 1, 'parent_id' => null, 'name' => 'Produk Konsumen', 'slug' => 'produk-konsumen', 'order' => 1],
            ['id' => 2, 'parent_id' => null, 'name' => 'Food Service', 'slug' => 'food-service', 'order' => 2],
            ['id' => 3, 'parent_id' => null, 'name' => 'Mesin-Mesin & Peralatan Khusus', 'slug' => 'mesin-peralatan-khusus', 'order' => 3],
            
            // Produk Konsumen Subs
            ['id' => 4, 'parent_id' => 1, 'name' => 'Supresso', 'slug' => 'consumer-supresso', 'order' => 1],
            ['id' => 5, 'parent_id' => 1, 'name' => 'BaliCafé', 'slug' => 'consumer-balicafe', 'order' => 2],
            ['id' => 6, 'parent_id' => 1, 'name' => 'UCAFÉ', 'slug' => 'consumer-ucafe', 'order' => 3],
            ['id' => 7, 'parent_id' => 1, 'name' => 'Rasa Sayang', 'slug' => 'consumer-rasa-sayang', 'order' => 4],
            ['id' => 8, 'parent_id' => 1, 'name' => 'Tugu Buaya', 'slug' => 'consumer-tugu-buaya', 'order' => 5],
            ['id' => 9, 'parent_id' => 1, 'name' => 'Uang Emas', 'slug' => 'consumer-uang-emas', 'order' => 6],
            ['id' => 10, 'parent_id' => 1, 'name' => 'BROCHOCO', 'slug' => 'consumer-brochoco', 'order' => 7],
            ['id' => 11, 'parent_id' => 1, 'name' => 'Jaheku', 'slug' => 'consumer-jaheku', 'order' => 8],
            ['id' => 12, 'parent_id' => 1, 'name' => 'Intirasa', 'slug' => 'consumer-intirasa', 'order' => 9],
            ['id' => 13, 'parent_id' => 1, 'name' => 'Hao Cafe', 'slug' => 'consumer-hao-cafe', 'order' => 10],

            // Food Service Subs
            ['id' => 14, 'parent_id' => 2, 'name' => 'Kopi', 'slug' => 'service-kopi', 'order' => 1],
            ['id' => 15, 'parent_id' => 2, 'name' => 'Krimer', 'slug' => 'service-krimer', 'order' => 2],
            ['id' => 16, 'parent_id' => 2, 'name' => 'Teh', 'slug' => 'service-teh', 'order' => 3],
            ['id' => 17, 'parent_id' => 2, 'name' => 'Jahe', 'slug' => 'service-jahe', 'order' => 4],
            ['id' => 18, 'parent_id' => 2, 'name' => 'Cokelat', 'slug' => 'service-cokelat', 'order' => 5],
            ['id' => 19, 'parent_id' => 2, 'name' => 'Gula', 'slug' => 'service-gula', 'order' => 6],

            // Mesin & Peralatan Subs
            ['id' => 20, 'parent_id' => 3, 'name' => 'Mesin Kopi', 'slug' => 'mesin-kopi', 'order' => 1],
            ['id' => 21, 'parent_id' => 3, 'name' => 'Dispenser Minuman', 'slug' => 'dispenser-minuman', 'order' => 2],
            ['id' => 22, 'parent_id' => 3, 'name' => 'Aksesoris', 'slug' => 'aksesoris', 'order' => 3],
            ['id' => 23, 'parent_id' => 3, 'name' => 'Garansi', 'slug' => 'garansi', 'order' => 4],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['id' => $cat['id']], $cat);
        }
    }
}
