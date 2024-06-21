<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidUserRoleId;
use App\Rules\MaxReviewsPerShop;
use App\Rules\CanDeleteReview;

class ReviewRequest extends FormRequest
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
            'user_id' => ['required,exists:users,id', new ValidUserRoleId],
            'shop_id' => ['required', 'exists:shops,id', new MaxReviewsPerShop($this->user()->id, $this->shop_id)],
            'star' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:400',
            'image.*' => 'image|mimes:jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ユーザーidは必須項目です',
            'user_id.exists' => '存在しないユーザーidです',
            'shop_id.required' => 'ショップidは必須項目です',
            'shop_id.exists' => '存在しないショップidです',
            'star.required' => 'スター評価は必須項目です',
            'star.integer' => 'スター評価は数値で入力してください',
            'star.min' => 'スター評価は1以上で入力してください',
            'star.max' => 'スター評価は5以下で入力してください',
            'comment.required' => 'コメントは必須項目です',
            'comment.string' => 'コメントは文字で入力してください',
            'comment.max' => 'コメントは400字以内で入力してください',
            'image.*.image' => '画像は画像形式で送信してください',
            'image.*.mimes' => '画像はjpegかpngで送信してください',
            'image.*.max' => '画像は2048MB以内のサイズで送信してください',
        ];
    }
}
