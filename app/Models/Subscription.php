<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'mailblastid';
    protected $guarded = [];
    public $timestamps = false; // Original table doesn't seem to have standard Laravel timestamps
}
