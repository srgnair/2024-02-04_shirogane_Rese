<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function like_shops()
    {
        return $this->belongsToMany(Shop::class, 'shop_user', 'user_id', 'shop_id');
    }

    //     このbookmark_articles()メソッドを使うと、ユーザーがブックマークした記事リソースに容易にアクセスできるようになります。例えば、自分がブックマークした記事の一覧を取得したいならば次のように書きます。

    // （例）

    // $user = \Auth::user();
    // $articles = $user->bookmark_articles()->get();
    // https://newmonz.jp/lesson/laravel-basic/chapter-9

    public function is_bookmark($articleId)
    {
        return $this->bookmarks()->where('articke_id', $articleId)->exists();
    }
     protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
