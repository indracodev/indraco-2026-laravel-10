<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
$variants = App\Models\Variant::where('status', 'active')->limit(3)->get();
foreach($variants as $v) {
    echo "ID: {$v->id} | Name: {$v->variant_name}\n";
    echo "Desc: {$v->description}\n";
    echo "-------------------\n";
}
