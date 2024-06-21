<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class AdminShopController extends Controller
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

        $img = $request->file('image');
        $filename = uniqid() . '.' . $img->getClientOriginalExtension();
        $img->storeAs('public/img', $filename);
        $newShop['image'] = 'storage/img/' . $filename;

        Shop::create($newShop);

        return redirect()->route('addNewShopView')->with('message', '登録されました！');
    }

    public function editShopView()
    {
        $user_id = Auth::id();
        $shops = Shop::where('shop_admin_id', $user_id)->get();

        return view('editShop', compact('shops'));
    }

    public function editShop(Request $request)
    {
        $shop_admin_id = Auth::id();
        $shop_id = $request->input('shop_id');

        $shopData = $request->except('_token');
        $shopData['shop_admin_id'] = $shop_admin_id;

        $img = $request->file('image');
        $filename = uniqid() . '.' . $img->getClientOriginalExtension();
        $img->storeAs('public/img', $filename);
        $shopData['image'] = 'storage/img/' . $filename;

        $shop = Shop::findOrFail($shop_id);
        $shop->update($shopData);

        return redirect()->route('editShopView')->with('message', '登録されました！');
    }
}
