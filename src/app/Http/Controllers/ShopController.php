<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function allShopsView(Request $request)
    {
        $keyword = $request->input('keyword');
        $area = $request->input('area');
        $genre = $request->input('genre');

        $query = Shop::query();

        if (!empty($keyword)) {
            $query->where('shop_name', 'LIKE', "%{$keyword}%");
        }

        if (!empty($area)) {
            $query->where('area', $area);
        }

        if (!empty($genre)) {
            $query->where('genre', $genre);
        }

        $shops = $query->get();

        return view('allShops', compact('shops'));
    }

    public function detailView($shop_id, Request $request)
    {
        $shop = Shop::find($shop_id);
        $reviews = Review::where('shop_id', $shop->id)->get();
        $reviewExists = $reviews->contains('user_id', Auth::id());

        $existingReserve = Reserve::where('shop_id', $shop->id)->exists();
        $existingReview = Review::where('shop_id', $shop->id)->exists();

        return view('detailShop', compact('shop', 'existingReserve', 'existingReview', 'reviews', 'reviewExists'));
    }
}
