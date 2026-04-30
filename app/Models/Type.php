<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'master_type';
    protected $guarded = [];

    public function getNameAttribute()
    {
        return $this->type_name;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['type_name'] = $value;
    }
    public $timestamps = false;

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
