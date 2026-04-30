<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'master_kategori';
    protected $guarded = [];

    public function getNameAttribute()
    {
        return $this->nama_kategori;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['nama_kategori'] = $value;
    }

    public function getOrderAttribute()
    {
        return $this->urutan;
    }

    public function setOrderAttribute($value)
    {
        $this->attributes['urutan'] = $value;
    }

    public function getIconPathAttribute()
    {
        return $this->ikon_path;
    }

    public function setIconPathAttribute($value)
    {
        $this->attributes['ikon_path'] = $value;
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
