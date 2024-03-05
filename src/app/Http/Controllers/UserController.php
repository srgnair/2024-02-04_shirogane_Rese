<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerificationMail;

class UserController extends Controller
{
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

        // // Userモデルに保存されているメール認証用トークンを取得
        // $verificationToken = $user->email_verification_token;

        // // ビューに変数を渡してメール送信
        // Mail::to($user->email)->send(new VerificationMail($verificationToken));

        $user->sendEmailVerificationNotification();

        return redirect()->route('thanks');
    }


    public function registerThanks()
    {
        return view('thanks');
    }

    public function showPhpInfo()
    {
        phpinfo();
    }

}

