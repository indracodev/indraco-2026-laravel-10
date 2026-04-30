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
        return app()->getLocale() == 'en' && !empty($this->nama_merek_eng) ? $this->nama_merek_eng : $this->nama_merek;
    }

    public function getDescAttribute()
    {
        return app()->getLocale() == 'en' && !empty($this->deskripsi_eng) ? $this->deskripsi_eng : $this->deskripsi;
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
