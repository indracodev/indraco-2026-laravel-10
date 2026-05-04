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

    public function getContentAttribute()
    {
        return $this->isi;
    }

    public function setContentAttribute($value)
    {
        $this->attributes['isi'] = $value;
    }

    public function getContentEnAttribute()
    {
        return $this->isi_eng;
    }

    public function setContentEnAttribute($value)
    {
        $this->attributes['isi_eng'] = $value;
    }
    protected $fillable = [
        'slug',
        'title',
        'title_en',
        'date_text',
        'date_text_en',
        'content',
        'content_en',
        'image_path',
    ];

    public function getTranslatedTitleAttribute()
    {
        if (app()->getLocale() === 'en' && !empty($this->title_en)) {
            return $this->title_en;
        }
        return $this->title;
    }

    public function getTranslatedDateAttribute()
    {
        if (app()->getLocale() === 'en' && !empty($this->date_text_en)) {
            return $this->date_text_en;
        }
        return $this->date_text;
    }

    public function getTranslatedContentAttribute()
    {
        if (app()->getLocale() === 'en' && !empty($this->content_en)) {
            return $this->content_en;
        }
        return $this->content;
    }
}
