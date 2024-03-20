@extends('common')
@section('title')
<title>店舗管理者追加</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/adminShopContents.css') }}">
@endsection
@section('content')

<div class="adminShopContents">

    <div class="adminShopContents">
        <div class="adminShopContents__title">
            add new partner
        </div>
        <div class="adminShopContents__content">

            <form class="form__wrapper" action="{{ route('addNewPartner') }}" method="POST">
                @csrf
                <div class="form">

                    <div class="form__item">
                        <input class="form__item--control" type="text" name="name" value="{{ old('name') }}" placeholder="name" />
                    </div>

                    <div class="form__item">
                        <select id="selectRole" name="role" class="form__item--control">
                            <option value="">role</option>
                            <option value="user">一般ユーザー</option>
                            <option value="mainAdmin">管理者</option>
                            <option value="shopAdmin">店舗管理者</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <input class="form__item--control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                    </div>

                    <div class="form__item">
                        <input class="form__item--control" type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
                    </div>

                    <input type="hidden" name="email_verified_at" value="{{ now() }}">

                    @if(session('message'))
                    <div class="form__submit">
                        {{ session('message') }}
                    </div>
                    @else
                    <div class="form__submit">
                        <button type="submit">登録</button>
                    </div>
                    @endif

                </div>

            </form>
        </div>
    </div>

</div>

@endsection