<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
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

    public function reserveCompleteView()
    {
        return view('completeReserve');
    }

    public function reserveEdit($shop_id, Request $request)
    {
        $reserveData = $request->except('_token');

        $shop = Shop::findOrFail($shop_id);
        $shop->reserves()->update($reserveData);

        return redirect()->route('mypage');
    }

    public function reserveDelete($id)
    {
        Reserve::findOrFail($id)->delete();

        return redirect('mypage');
    }
}
