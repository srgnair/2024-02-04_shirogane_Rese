<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class QrCodeController extends Controller
{
    public function showQrReaderView()
    {
        return view('auth.showQrReader');
    }

    public function showQrReader(Request $request)
    {

        $result = false;
        $user = User::where('uuid', $request->uuid)->first();

        if (!is_null($user)) {

            Auth::login($user);
            $result = true;
        }

        return [
            'result' => $result,
            'user' => $user
        ];
    }
}
