<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function addNewShopView()
    {
        return view('addNewShop');
    }

    public function addNewShop(Request $request)
    {
        $shop_admin_id = Auth::id();

        $newShop = $request->all();
        $newShop['shop_admin_id'] = $shop_admin_id;

        Shop::create($newShop);

        return redirect()->route('shopAdminView');
    }

    public function editShopView()
    {
        // ログイン中のユーザーのIDを取得
        $user_id = Auth::id();

        // ログイン中のユーザーのshop_admin_id と一致する店舗情報を取得
        $shops = Shop::where('shop_admin_id', $user_id)->get();

        // ビューにデータを渡す
        return view('editShop', compact('shops'));
    }

    public function editShop(Request $request)
    {
        $shop_admin_id = Auth::id();
        $shop_id = $request->input('shop_id');

        // フォームデータから不要な_tokenキーを削除
        $shopData = $request->except('_token');
        $shopData['shop_admin_id'] = $shop_admin_id;

        // $idを使用して対象の店舗を取得
        $shop = Shop::findOrFail($shop_id);

        // 取得した店舗情報を更新する
        $shop->update($shopData);

        // リダイレクト
        return redirect()->route('shopAdminView');
    }

    public function readReserves()
    {
        // ログイン中のユーザーのIDを取得
        $user_id = Auth::id();

        // ログイン中のユーザーの shop_admin_id と一致する店舗情報を取得
        $reserves = Reserve::whereHas('shop', function ($query) use ($user_id) {
            $query->where('shop_admin_id', $user_id);
        })->get();

        return view('readReserves', compact('reserves'));
    }

    public function addNewPartnerView()
    {
        return view('addNewPartner');
    }

    public function addNewPartner(Request $request)
    {
        $newPartner = $request->all();

        // パスワードをハッシュ化して保存する
        $newPartner['password'] = Hash::make($request->password);

        User::create($newPartner);

        return redirect()->route('addNewPartnerView');
    }
}
