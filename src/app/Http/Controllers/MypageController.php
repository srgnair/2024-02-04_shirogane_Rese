<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypageView(Request $request)
    {
        $user = Auth::user();
        $reservations = $user->reserves()->with('shop')->orderBy('reserved_date', 'asc')->get();
        $likes = $user->likes()->with('shop')->get();

        return view('mypage', compact('reservations', 'likes'));
    }
}
