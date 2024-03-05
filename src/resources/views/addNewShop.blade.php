@extends('common')
@section('title')
<title>店舗追加</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/addNewShop.css') }}">
@endsection
@section('content')

<div class="addNewShop">

    <div class="addNewShop">
        <div class="addNewShop__title">
            add new shop
        </div>
        <div class="addNewShop__content">

            <form class="form__wrapper" action="{{ route('addNewShop') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form">

                    <div class="form__item">
                        <label for="shop_name">ショップ名：</label>
                        <input class="form__item--control" type="text" name="shop_name" value="{{ old('name') }}" placeholder="shop name" />
                    </div>

                    <div class="form__item">
                        <label for="image">イメージ：</label>
                        <input class="form__item--control" type="file" name="image" value="{{ old('image') }}" placeholder="image" />
                    </div>

                    <div class="form__item">
                        <select id="selectArea" name="area" class="form__item--control">
                            <option value="">area</option>
                            <option value="1">東京都</option>
                            <option value="2">大阪府</option>
                            <option value="3">福岡県</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <select id="selectGenre" name="genre" class="form__item--control">
                            <option value="">genre</option>
                            <option value="1">イタリアン</option>
                            <option value="2">ラーメン</option>
                            <option value="3">居酒屋</option>
                            <option value="4">寿司</option>
                            <option value="5">焼肉</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <div class="form__item--textarea">
                            <textarea id="inputIntroduction" class="radioform__item--comment" type="text" name="introduction" value="{{ old('introduction') }}" placeholder="こちらに紹介文を入力してください"></textarea>
                        </div>
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