<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
// use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerView()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        // メール認証
        // $validatedData = $request->validated();
        // $hashedPassword = Hash::make($validatedData['password']);
        // $user = User::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'password' => $hashedPassword,
        // ]);

        // $user->sendEmailVerificationNotification();

        // return redirect()->route('verifyEmail');

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $hashedPassword = Hash::make($password);

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        return redirect()->route('thanks');
    }


    public function thanks()
    {
        return view('thanks');
    }
}
