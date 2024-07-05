<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class ValidUserRoleId implements Rule
{
    public function passes($attribute, $value)
    {
        $user = User::find($value);

        return $user && ($user->role === null || $user->role === 'user');
    }

    public function message()
    {
        return '投稿は一般ユーザーで行ってください';
    }
}
