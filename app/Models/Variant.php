<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $table = 'master_variant';
    protected $guarded = [];

    public function getNameAttribute()
    {
        return $this->variant_name;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['variant_name'] = $value;
    }

    public function getOrderAttribute()
    {
        return $this->sort_order;
    }

    public function setOrderAttribute($value)
    {
        $this->attributes['sort_order'] = $value;
    }
    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
