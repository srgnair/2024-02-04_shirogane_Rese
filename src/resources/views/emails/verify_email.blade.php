@component('mail::message')
# ご登録ありがとうございます

この度はご登録いただき、ありがとうございます。<br>
ご登録を続けるには、以下のボタンをクリックしてください。

$verificationToken = $user->email_verification_token;

@component('mail::button', ['url' => route('verification.verify', $verificationToken)])
ご登録を続ける
@endcomponent

※こちらのメールは送信専用のメールアドレスより送信しております。恐れ入りますが、直接ご返信しないようお願いいたします。

{{ config('app.name') }}
@endcomponent