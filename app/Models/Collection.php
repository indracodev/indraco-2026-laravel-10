<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'master_collection';
    protected $guarded = [];

    public function getNameAttribute()
    {
        return $this->collection_name;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['collection_name'] = $value;
    }

    public function getBrandIdAttribute()
    {
        return $this->merek_id;
    }

    public function setBrandIdAttribute($value)
    {
        $this->attributes['merek_id'] = $value;
    }
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'merek_id');
    }

    public function types()
    {
        return $this->hasMany(Type::class);
    }

    public function variants()
    {
        return $this->hasManyThrough(Variant::class, Type::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
