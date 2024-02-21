<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function shopAdminView()
    {
        return view('shopAdmin');
    }

    public function mainAdminView()
    {
        return view('mainAdmin');
    }
}
