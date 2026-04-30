<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'master_produk';
    protected $guarded = [];

    public function getNameAttribute()
    {
        return $this->nama_produk;
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
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
