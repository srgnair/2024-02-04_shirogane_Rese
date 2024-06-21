<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;

class AdminReservesController extends Controller
{
    public function showReserves()
    {
        $user_id = Auth::id();

        $reserves = Reserve::whereHas('shop', function ($query) use ($user_id) {
            $query->where('shop_admin_id', $user_id);
        })->orderBy('reserved_date', 'asc')->get();

        return view('readReserves', compact('reserves'));
    }

    public function todayReserves()
    {
        $users = User::all();

        $reserves = collect();

        foreach ($users as $user) {
            $reserves = $reserves->merge($user->reserves()->with('shop')->whereDate('reserved_date', today())->get());
        }

        $reseves = $reserves->sortBy('reserved_date');

        return view('readReserves', compact('reserves'));
    }
}
