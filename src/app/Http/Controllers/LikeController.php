<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $user_id = Auth::id();
        $shop_id = $request->input('shop_id');

        $like = [
            'user_id' => $user_id,
            'shop_id' => $shop_id,
        ];

        Like::create($like);

        return back();
    }


    public function deleteLike($shop_id)
    {
        $userId = Auth::id();

        Like::where('user_id', $userId)
            ->where('shop_id', $shop_id)
            ->delete();

        return back();
    }
}
