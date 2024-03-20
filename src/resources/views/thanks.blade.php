@extends('common')
@section('title')
<title>thanks</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection
@section('content')

<div class="register-complete">

    <div class="register-complete__title">
        会員登録ありがとうございます。<br>
        送信されたメール内から認証を完了してください。
    </div>

    <div class="register-complete__link">
        <a href="{{ route('login') }}">ログインする</a>
    </div>

</div>

@endsection