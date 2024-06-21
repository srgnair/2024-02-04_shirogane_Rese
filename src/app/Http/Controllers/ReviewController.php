<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function postReviewView($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);

        $reviews = Review::where('shop_id', $shop_id)->get();

        return view('postReview', compact('shop_id', 'shop', 'reviews'));
    }

    public function postReview(Request $request, $shop_id)
    {
        dd($request->all());

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'shop_id' => 'required|exists:shops,id',
            'star' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:400',
            'image.*' => 'image|mimes:jpeg,png|max:2048'
        ]);

        $review = Review::create([
            'user_id' => Auth::id(),
            'shop_id' => $shop_id,
            'star' => $request->star,
            'comment' => $request->comment,
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('review_image', 'public');
                ReviewImage::create([
                    'review_id' => $review->id,
                    'image_path' => $path,
                ]);
            }
            $review->image_count = count($request->file('image'));
            $review->save();
        }

        return response()->json(['message' => 'Review created successfully']);
    }

    public function deleteReview($review_id, $shop_id)
    {
        Review::findOrFail($review_id)->delete();

        return redirect()->route('commentView', compact('shop_id'));
    }

    public function editReviewView($review_id, $shop_id)
    {
        $review = Review::findOrFail($review_id);
        $shop = Shop::findOrFail($shop_id);

        return view('editReview', compact('review', 'shop'));
    }

    public function editReview(Request $request, $shop_id, $review_id)
    {
        $user_id = Auth::id();

        $review = Review::where('id', $review_id)->where('user_id', $user_id)->where('shop_id', $shop_id)->firstOrFail();

        $validatedData = $request->validate([
            'star' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:400',
            'image' => 'nullable|image|mimes:jpeg,png|max:2048'
        ]);

        $reviewData = $validatedData;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $reviewData['image'] = 'images/' . $filename;
        }

        $review->update($reviewData);

        return redirect()->route('detailShop', ['shop_id' => $shop_id])->with('success', 'レビューが更新されました。');
    }
}
