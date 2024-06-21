<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Review;

class MaxReviewsPerShop implements Rule
{
    protected $userId;
    protected $shopId;

    public function __construct($userId, $shopId)
    {
        $this->userId = $userId;
        $this->shopId = $shopId;
    }

    public function passes($attribute, $value)
    {
        $reviewCount = Review::where('user_id', $this->userId)
            ->where('shop_id', $this->shopId)
            ->count();

        return $reviewCount < 2;
    }

    public function message()
    {
        return 'You cannot add more than 2 reviews for the same shop.';
    }
}
