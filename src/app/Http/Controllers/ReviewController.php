<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;
use App\Rules\CanDeleteReview;

class ReviewController extends Controller
{
    public function postReviewView($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);

        $reviews = Review::where('shop_id', $shop_id)->get();

        return view('postReview', compact('shop_id', 'shop', 'reviews'));
    }

    public function postReview(ReviewRequest $request, $shop_id)
    {
        $review = Review::create([
            'user_id' => Auth::id(),
            'shop_id' => $shop_id,
            'star' => $request->star,
            'comment' => $request->comment,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('review_image', 'public');
            ReviewImage::create([
                'review_id' => $review->id,
                'image_path' => $path,
            ]);
            $review->image_count = 1;
        } else {
            $review->image_count = 0;
        }

        $review->save();

        return redirect()->route('detail', compact('shop_id'));
    }

    public function deleteReview(ReviewRequest $request, $review_id, $shop_id)
    {
        $review = Review::findOrFail($review_id);

        $this->authorize('delete', $review);

        $request->validate([
            'user_id' => ['required', new CanDeleteReview(auth()->id(), $review_id)],
        ]);

        $review->delete();

        return redirect()->route('detail', compact('shop_id'));
    }

    public function editReviewView($review_id, $shop_id)
    {
        $review = Review::findOrFail($review_id);
        $rating = $review->star;
        $shop = Shop::findOrFail($shop_id);

        return view('editReview', compact('review', 'shop','rating'));
    }

    public function editReview(ReviewRequest $request, $review_id, $shop_id)
    {
        $user_id = Auth::id();

        $review = Review::where('id', $review_id)->where('user_id', $user_id)->where('shop_id', $shop_id)->firstOrFail();

        $validatedData = $request->validate([
            'star' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:400',
            'image' => 'nullable|image|mimes:jpeg,png|max:2048'
        ]);

        $reviewData = $validatedData;

        if ($request->hasFile('new_image')) {
            $file = $request->file('new_image');
            $path = $file->store('review_image', 'public');

            // 新しい画像を保存する前に、古い画像を削除する場合はここで行う（例として、1枚のみの前提であれば）
            $review->images()->delete(); // すべての関連する画像を削除する例

            $review->images()->create([
                'image_path' => $path,
            ]);

            $review->update($reviewData);
        }

        return redirect()->route('detail', compact('shop_id'))->with('success', 'レビューが更新されました。');
    }
}