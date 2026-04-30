<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;

class Product extends Model
{
    use HasLogAktivitas;
    use HasFactory;

    protected $table = 'master_produk';
    protected $guarded = [];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'en' && !empty($this->nama_produk_eng) ? $this->nama_produk_eng : $this->nama_produk;
    }

    public function getPackingAttribute()
    {
        return app()->getLocale() == 'en' && !empty($this->tipe_packing_eng) ? $this->tipe_packing_eng : $this->tipe_packing;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['nama_produk'] = $value;
    }

    public function getBrandIdAttribute()
    {
        return $this->merek_id;
    }

    public function setBrandIdAttribute($value)
    {
        $this->attributes['merek_id'] = $value;
    }

    public function getCategoryIdAttribute()
    {
        return $this->kategori_id;
    }

    public function setCategoryIdAttribute($value)
    {
        $this->attributes['kategori_id'] = $value;
    }

    protected $casts = [
        'gallery_images' => 'json',
        'is_featured' => 'boolean',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'merek_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }
}
