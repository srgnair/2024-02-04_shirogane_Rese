<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function postReview(Request $request)
    {
        $user_id = Auth::id();

        $review = $request->all();
        $review['user_id'] = $user_id;
        $review['shop_id'] = $request->input('shop_id');

        Review::create($review);

        return redirect('detail');
    }
}