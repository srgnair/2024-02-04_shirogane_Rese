@extends('common')
@section('title')
<title>Registration</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<div class="register-form">
    <div class="register-form__title">
        Registration
    </div>
    <div class="register-form__content">
        @if (count($errors) > 0)
        <p>内容を確認してください</p>
        @endif
        <form class="form__wrapper" action="/register" method="POST">
            @csrf
            <div class="form">
                @error('name')
                <p>{{$errors->first('name')}}</p>
                @enderror
                <div class="form__item">
                    <label for="name"><i class="fa-solid fa-user"></i></label>
                    <input class="form__item--control" type="text" name="name" value="{{ old('name') }}" placeholder="Username" />
                </div>
                @error('email')
                <p>{{$errors->first('email')}}</p>
                @enderror
                <div class="form__item">
                    <label for="email"><i class="fa-solid fa-envelope"></i></label>
                    <input class="form__item--control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                </div>
                @error('email')
                <p>{{$errors->first('password')}}</p>
                @enderror
                <div class="form__item">
                    <label for="password"><i class="fa-solid fa-lock"></i></label>
                    <input class="form__item--control" type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
                </div>

                <div class="form__submit">
                    <button type="submit">登録</button>
                </div>

            </div>

        </form>
    </div>
</div>

@endsection