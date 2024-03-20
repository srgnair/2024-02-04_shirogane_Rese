<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;

class AdminEmailController extends Controller
{
    public function sendEmailView()
    {
        $user_id = Auth::id();

        $reserves = Reserve::whereHas('shop', function ($query) use ($user_id) {
            $query->where('shop_admin_id', $user_id);
        })->get();

        return view('sendEmail', compact('reserves'));
    }

    public function sendEmail(Request $request)
    {
        $subject = $request->input('subject');
        $body = $request->input('body');
        $recipient = $request->input('recipient');

        $notificationEmail = new NotificationEmail($subject, $body);

        Mail::to($recipient)->send($notificationEmail);

        if (count(Mail::failures()) > 0) {
            $message = 'メール送信に失敗しました';

            return back()->withErrors($message);
        } else {
            $message = 'メールを送信しました';

            return redirect()->route('sendEmailView')->with(compact('message'));
        }
    }
}
