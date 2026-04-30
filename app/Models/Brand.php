<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'master_merek';
    protected $guarded = [];

    public function getNameAttribute()
    {
        return $this->nama_merek;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['nama_merek'] = $value;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
