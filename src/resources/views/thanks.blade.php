@extends('common')
@section('title')
<title>thanks</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection
@section('content')

<!-- ★にはアイコンを挿入する -->

<div class="register-complete">

    <div class="register-complete__title">
        会員登録ありがとうございます
    </div>

    <div class="register-complete__link">
        <a href="{{ route('login') }}">ログインする</a>
    </div>

</div>

@endsection