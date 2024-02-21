<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function allShopsView(Request $request)
    {
        /* キーワードの取得 */
        $keyword = $request->input('keyword');

        /* エリアの取得 */
        $area = $request->input('area');

        /* ジャンルの取得 */
        $genre = $request->input('genre');

        // クエリビルダーを初期化
        $query = Shop::query();

        // キーワードが入力されている場合は検索条件に追加
        if (!empty($keyword)) {
            $query->where('shop_name', 'LIKE', "%{$keyword}%");
        }

        // エリアが選択されている場合は検索条件に追加
        if (!empty($area)) {
            $query->where('area', $area);
        }

        // ジャンルが選択されている場合は検索条件に追加
        if (!empty($genre)) {
            $query->where('genre', $genre);
        }

        // 全ての条件を満たすレコードを取得
        $shops = $query->get();

        return view('allShops', compact('shops'));
    }

    public function detailView($id, Request $request)
    {
        $shop = Shop::find($id);

        // 既存の予約情報を取得
        $existingReserve = Reserve::where('shop_id', $shop->id)->exists();
        $existingReview = Review::where('shop_id', $shop->id)->exists();

        return view('detailShop', compact('shop', 'existingReserve', 'existingReview'));
    }

    public function mypageView(Request $request)
    {
        // ログイン中のユーザーの予約情報を取得する
        $user = Auth::user();
        $reservations = $user->reserves()->with('shop')->get();
        $likes = $user->likes()->with('shop')->get();
        // $reviews = Review::where('user_id', $user->id)->get();

        return view('mypage', compact('reservations', 'likes'));
    }

}
