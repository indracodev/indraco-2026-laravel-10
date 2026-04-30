<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;

$categories = Category::all();
foreach($categories as $cat) {
    echo "ID: {$cat->id}, Slug: {$cat->slug}, Parent: {$cat->parent_id}\n";
}
