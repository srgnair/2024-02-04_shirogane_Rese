<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        // 時刻のフォーマットを変更して返す
        return date('H:i', strtotime($value));
    }

    // アクセサの定義
    public function getReservedAtAttribute()
    {
        // 組み合わせてDateTimeオブジェクトを作成して返す
        return Carbon::createFromFormat('Y-m-d H:i', $this->reserved_date . ' ' . $this->reserved_time);
    }
}
