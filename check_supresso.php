<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$brand = App\Models\Brand::where('slug','supresso')->first();
echo "Brand: ".$brand->id." - ".$brand->nama_merek."\n";
echo "Deskripsi ENG: ".$brand->deskripsi_eng."\n\n";

$cols = App\Models\Collection::where('merek_id',$brand->id)->where('status','active')->orderBy('id')->get();
foreach($cols as $col) {
    echo "Collection: ".$col->id." - ".$col->collection_name."\n";
    
    $variants = App\Models\Variant::whereHas('type',function($q) use ($col){
        $q->where('collection_id',$col->id);
    })->where('status','active')->orderBy('sort_order')->get();
    
    echo "  Variants (".count($variants)."):\n";
    foreach($variants as $v) {
        $prodCount = App\Models\Product::where('variant_id',$v->id)->where('status','active')->count();
        echo "    - ".$v->variant_name." (icon: ".($v->icon_path?'yes':'no').", products: ".$prodCount.")\n";
    }
}
