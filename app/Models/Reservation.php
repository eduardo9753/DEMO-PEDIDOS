<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'customer_name',
        'number_phone',
        'url',
        'number_of_seats',
        'start',
        'end',
        'hour_start',
        'hour_end',
        'state',
        'table_id',
        'user_id',
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
