@extends('common')
@section('title')
<title>Login</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<!-- ★にはアイコンを挿入する -->

<div class="login-form">
    <div class="login-form__title">
        login
    </div>
    <div class="login-form__content">
        <!-- @if (count($errors) > 0)
        <p>入力に問題があります</p>
            @endif -->
        <form class="form__wrapper" action="/login" method="POST">
            @csrf
            <div class="form">

                <!-- @error('email')
                <p>{{$errors->first('email')}}</p>
                @enderror -->
                <div class="form__item">
                    <label for="email"><i class="fa-solid fa-envelope"></i></label>
                    <input class="form__item--control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                </div>
                <!-- @error('email')
                <p>{{$errors->first('password')}}</p>
                @enderror -->
                <div class="form__item">
                    <label for="password"><i class="fa-solid fa-lock"></i></label>
                    <input class="form__item--control" type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
                </div>

                <div class="form__submit">
                    <button type="submit">ログイン</button>
                </div>

            </div>

        </form>
    </div>
</div>

@endsection