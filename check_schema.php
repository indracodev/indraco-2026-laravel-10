<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

function checkCols($table) {
    echo "\nTable: $table\n";
    $cols = Illuminate\Support\Facades\Schema::getColumnListing($table);
    print_r($cols);
}

checkCols('master_variant');
checkCols('master_produk');
checkCols('master_collection');
