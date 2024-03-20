@extends('common')
@section('title')
<title>Login</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<div class="login-form">
    <div class="login-form__title">
        login
    </div>
    <div class="login-form__content">
        @if (count($errors) > 0)
        以下の内容を確認してください
        @endif
        @error('email')
        <p>{{$errors->first('email')}}</p>
        @enderror
        @error('password')
        <p>{{$errors->first('password')}}</p>
        @enderror

        @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
        @endif

        @if (!session('message'))
        <form class="form__wrapper" action="/login" method="POST">
            @csrf
            <div class="form">

                <div class="form__item">
                    <label for="email"><i class="fa-solid fa-envelope"></i></label>
                    <input class="form__item--control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                </div>

                <div class="form__item">
                    <label for="password"><i class="fa-solid fa-lock"></i></label>
                    <input class="form__item--control" type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
                </div>

                <div class="form__submit">
                    <button type="submit">ログイン</button>
                </div>

            </div>

        </form>
        @endif
    </div>
</div>

@endsection