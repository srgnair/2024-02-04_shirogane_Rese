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
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{

    public function reserve(ReserveRequest $request)
    {
        $user_id = Auth::id();

        $reserve = $request->all();
        $reserve['user_id'] = $user_id;
        $reserve['shop_id'] = $request->input('shop_id');

        Reserve::create($reserve);

        return redirect('reserve');
    }

    public function reserveEdit($shop_id, Request $request)
    {
        // フォームデータから不要な_tokenキーを削除
        $reserveData = $request->except('_token');

        // $shop_idを使用して対象の店舗を取得し、その店舗に紐づく予約レコードを更新する
        $shop = Shop::findOrFail($shop_id);
        $shop->reserves()->update($reserveData);

        // リダイレクト
        return redirect()->route('mypage');
    }

    public function reserveComplete()
    {
        return view('completeReserve');
    }


    public function reserveDelete($id)
    {
        Reserve::findOrFail($id)->delete();

        return redirect('mypage');
    }
}
