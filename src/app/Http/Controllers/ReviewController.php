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

class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $user_id = Auth::id();

        $review = $request->all();
        $review['user_id'] = $user_id;
        $review['shop_id'] = $request->input('shop_id');

        Review::create($review);

        return redirect('detail');
    }
}
