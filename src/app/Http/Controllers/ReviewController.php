<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\DeleteReviewRequest;
use App\Rules\CanDeleteReview;
use Illuminate\Support\Facades\Storage;

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

    public function deleteReview(DeleteReviewRequest $request, $review_id, $shop_id)
    {
        $review = Review::findOrFail($review_id);
        $review->delete();

        return redirect()->route('detail', compact('shop_id'));
    }

    public function editReviewView($review_id, $shop_id)
    {
        $review = Review::findOrFail($review_id);
        $rating = $review->star;
        $shop = Shop::findOrFail($shop_id);

        return view('editReview', compact('review', 'shop', 'rating'));
    }

    public function editReview(ReviewRequest $request, $review_id, $shop_id)
    {
        $user_id = Auth::id();

        $reviewData = $request->except('_token');
        $reviewData['user_id'] = $user_id;
        $reviewData['shop_id'] = $shop_id;
        $reviewData['star'] = $request->star;
        $reviewData['comment'] = $request->comment;

        $review = Review::where('id', $review_id)->where('user_id', $user_id)->where('shop_id', $shop_id)->firstOrFail();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('review_image', 'public');

            foreach ($review->images as $existingImage) {
                Storage::disk('public')->delete($existingImage->image_path);
                $existingImage->delete();
            }

            ReviewImage::create([
                'review_id' => $review_id,
                'image_path' => $path,
            ]);
        }

        $review->update($reviewData);

        return redirect()->route('detail', compact('shop_id'))->with('message', '登録されました！');
    }
}
