<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // モデルの属性に対するアクセサを定義
    public function getAreaAttribute($value)
    {
        $areas = [
            '1' => '東京都',
            '2' => '大阪府',
            '3' => '福岡県'
        ];

        return $areas[$value] ?? $value;
    }

    public function getGenreAttribute($value)
    {
        $genres = [
            '1' => 'イタリアン',
            '2' => 'ラーメン',
            '3' => '居酒屋',
            '4' => '寿司',
            '5' => '焼肉'
        ];

        return $genres[$value] ?? $value;
    }

    protected $fillable = [
        'shop_name',
        'image',
        'area',
        'genre',
        'introduction',
    ];


    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
