<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function phpinfo()
    {
        return view('phpinfo');
    }

    public function registerView()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $hashedPassword = Hash::make($password);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->route('thanks');
    }

    public function registerThanks()
    {
        return view('thanks');
    }
}
