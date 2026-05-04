<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;

class News extends Model
{
    use HasLogAktivitas;
    use HasFactory;

    protected $table = 'master_news';
    public $timestamps = false;

    public function getTitleAttribute()
    {
        return $this->judul;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['judul'] = $value;
    }

    public function getTitleEnAttribute()
    {
        return $this->judul_eng;
    }

    public function setTitleEnAttribute($value)
    {
        $this->attributes['judul_eng'] = $value;
    }

    public function getDateTextAttribute()
    {
        return $this->tanggal;
    }

    public function setDateTextAttribute($value)
    {
        $this->attributes['tanggal'] = $value;
    }

    public function getDateTextEnAttribute()
    {
        return $this->tanggal_eng;
    }

    public function setDateTextEnAttribute($value)
    {
        $this->attributes['tanggal_eng'] = $value;
    }

    protected $fillable = [
        'slug',
        'judul',
        'judul_eng',
        'tanggal',
        'tanggal_eng',
        'content',
        'content_eng',
        'image_path',
    ];

    public function getTranslatedTitleAttribute()
    {
        if (app()->getLocale() === 'en') {
            return $this->judul_eng;
        }
        return $this->judul;
    }

    public function getTranslatedDateAttribute()
    {
        if (app()->getLocale() === 'en') {
            return $this->tanggal_eng;
        }
        return $this->tanggal;
    }

    public function getTranslatedContentAttribute()
    {
        if (app()->getLocale() === 'en') {
            return $this->content_eng;
        }
        return $this->content;
    }
}
