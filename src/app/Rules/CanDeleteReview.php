<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Review;
use App\Models\User;

class CanDeleteReview implements Rule
{
    protected $userId;
    protected $reviewId;

    public function __construct($userId, $reviewId)
    {
        $this->userId = $userId;
        $this->reviewId = $reviewId;
    }

    public function passes($attribute, $value)
    {
        $review = Review::find($this->reviewId);

        if (!$review) {
            return false;
        }

        return $review->user_id === $this->userId || $this->isAdmin($this->userId);
    }

    protected function isAdmin($userId)
    {
        $user = User::find($userId);
        return $user && $user->role === 'mainAdmin';
    }

    public function message()
    {
        return '口コミを削除する権限がありません';
    }
}
