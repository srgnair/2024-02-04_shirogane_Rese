@extends('common')
@section('title')
<title>admin for partner</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/detailShop.css') }}">
@endsection
@section('content')

<div class="register-complete">

    <div class="register-form">
        <div class="register-form__title">
            add new shop
        </div>
        <div class="register-form__content">

            <form class="form__wrapper" action="{{ route('addNewShop') }}" method="POST">
                @csrf
                <div class="form">

                    <label for="shop_name"></label>
                    <input class="form__item--control" type="text" name="shop_name" value="{{ old('name') }}" placeholder="shop name" />

                    <label for="image"></label>
                    <input class="form__item--control" type="file" name="image" value="{{ old('image') }}" placeholder="image" />

                    <select id="selectArea" name="area" class="form__item--control">
                        <option value="">area</option>
                        <option value="1">東京都</option>
                        <option value="2">大阪府</option>
                        <option value="3">福岡県</option>
                    </select>

                    <select id="selectGenre" name="genre" class="form__item--control">
                        <option value="">genre</option>
                        <option value="1">イタリアン</option>
                        <option value="2">ラーメン</option>
                        <option value="3">居酒屋</option>
                        <option value="4">寿司</option>
                        <option value="5">焼肉</option>
                    </select>

                    <div class="form__item--textarea">
                        <textarea id="inputIntroduction" class="radioform__item--comment" type="text" name="introduction" value="{{ old('introduction') }}" placeholder="こちらに紹介文を入力してください"></textarea>
                    </div>

                    <div class="form__submit">
                        <button type="submit">登録</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

</div>

@endsection