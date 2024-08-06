<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidUserRoleId;
use App\Rules\MaxReviewsPerShop;
use App\Rules\CanDeleteReview;

class DeleteReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'exists:users,id', new ValidUserRoleId],
            'shop_id' => ['required', 'exists:shops,id', new MaxReviewsPerShop($this->user()->id, $this->shop_id)],
            'review_id' => ['required', 'exists:reviews,id', new CanDeleteReview(auth()->id(), $this->review_id)],
        ];
    }

    /**
     * バリーデーションのためにデータを準備
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'shop_id' => $this->route('shop_id'),
            'review_id' => $this->route('review_id'),
        ]);
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ユーザーidは必須項目です',
            'user_id.exists' => '存在しないユーザーidです',
            'shop_id.required' => 'ショップidは必須項目です',
            'shop_id.exists' => '存在しないショップidです',
            'review_id.required' => 'レビューidは必須項目です',
            'review_id.exists' => '存在しないレビューidです',
        ];
    }
}
