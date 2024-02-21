<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;

class CustomLoginValidator
{
    public function validate(array $input)
    {
        Validator::make($input, [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ])->validate();
    }
}