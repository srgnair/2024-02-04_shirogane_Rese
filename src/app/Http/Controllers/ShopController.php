<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ShopController extends Controller
{
    public function allShops()
    {
        $shops = Shop::all();
        return view('allShops', compact('shops'));
    }

    public function detail($id)
    {
        $shop = Shop::find($id);
        return view('detailShop', ['shop' => $shop]);
    }

    public function reserve(Request $request)
    {
        $user_id = Auth::id();

        $reserve = $request->all();
        $reserve['user_id'] = $user_id;
        $reserve['shop_id'] = $request->input('shop_id');

        Reserve::create($reserve);

        return redirect('reserve');
    }

    public function completeReserve()
    {
        return view('completeReserve');
    }

    public function mypage(Request $request)
    {
        // ログイン中のユーザーの予約情報を取得する
        $user = Auth::user();
        $reservations = $user->reserves()->with('shop')->get();

        return view('mypage', compact('reservations'));
    }

    public function delete(Request $request)
    {
        Reserve::find($request->id)->delete();

        return redirect('mypage');
    }
}
