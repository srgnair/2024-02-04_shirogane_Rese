<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'shop_id', 'reserved_date', 'reserved_time', 'number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function getReservedTimeAttribute($value)
    {
        return date('H:i', strtotime($value));
    }

    public function getReservedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i', $this->reserved_date . ' ' . $this->reserved_time);
    }
}
