<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'youtube',
        'linkedin',
        'user_id'
    ];
}
