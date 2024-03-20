<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AdminPartnerController extends Controller
{
    public function addNewPartnerView()
    {
        return view('addNewPartner');
    }

    public function addNewPartner(RegisterRequest $request)
    {
        $newPartner = $request->all();
        $newPartner['password'] = Hash::make($request->password);

        User::create($newPartner);

        // $user->sendEmailVerificationNotification();

        return redirect()->route('addNewPartner')->with(compact('message'));
    }
}
