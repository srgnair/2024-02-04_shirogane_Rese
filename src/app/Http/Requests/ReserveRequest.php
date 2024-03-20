<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReserveRequest extends FormRequest
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
            'reserved_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->addDay()->format('Y-m-d'), 
                'before_or_equal:' . now()->addMonth()->format('Y-m-d'),
                Rule::unique('reserves')->where(function ($query) {
                    return $query->where('reserved_date', $this->input('reserved_date'))
                        ->where('user_id', auth()->id());
                })
            ],
            'reserved_time' => 'required',
            'number' => 'required',
            'shop_id' => 'required',
        ];
    }


    public function messages()
    {
        return [
            //
        ];
    }
}
