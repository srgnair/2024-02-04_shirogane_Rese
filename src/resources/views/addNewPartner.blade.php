@extends('common')
@section('title')
<title>admin</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/detailShop.css') }}">
@endsection
@section('content')

<div class="register-complete">

    <div class="register-form">
        <div class="register-form__title">
            add new partner
        </div>
        <div class="register-form__content">

            <form class="form__wrapper" action="{{ route('addNewPartner') }}" method="POST">
                @csrf
                <div class="form">

                    <label for="name"></label>
                    <input class="form__item--control" type="text" name="name" value="{{ old('name') }}" placeholder="name" />

                    <select id="selectRole" name="role" class="form__item--control">
                        <option value="">role</option>
                        <option value="user">一般ユーザー</option>
                        <option value="mainAdmin">管理者</option>
                        <option value="shopAdmin">店舗管理者</option>
                    </select>

                    <label for="email"></label>
                    <input class="form__item--control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" />

                    <label for="password"></label>
                    <input class="form__item--control" type="password" name="password" value="{{ old('password') }}" placeholder="Password" />

                    <div class="form__submit">
                        <button type="submit">登録</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

</div>

@endsection