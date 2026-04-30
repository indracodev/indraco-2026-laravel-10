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
        return app()->getLocale() == 'en' && !empty($this->variant_name_eng) ? $this->variant_name_eng : $this->variant_name;
    }

    public function getDescAttribute()
    {
        return app()->getLocale() == 'en' && !empty($this->description_eng) ? $this->description_eng : $this->description;
    }

    public function getTasteTranslatedAttribute()
    {
        return app()->getLocale() == 'en' && !empty($this->taste_eng) ? $this->taste_eng : $this->taste;
    }

    public function getRoastTranslatedAttribute()
    {
        return app()->getLocale() == 'en' && !empty($this->roast_eng) ? $this->roast_eng : $this->roast;
    }

    public function getIngredientTranslatedAttribute()
    {
        return app()->getLocale() == 'en' && !empty($this->ingredient_eng) ? $this->ingredient_eng : $this->ingredient;
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
