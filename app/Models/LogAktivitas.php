<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'master_log_aktivitas';

    protected $fillable = [
        'user_id',
        'aktivitas',
        'model',
        'model_id',
        'data_lama',
        'data_baru',
        'ip_address',
        'user_agent',
        'url',
    ];

    protected $casts = [
        'data_lama' => 'array',
        'data_baru' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
