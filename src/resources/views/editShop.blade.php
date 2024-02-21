<!-- 検索機能ー＞編集対象の店舗を表示(店舗名)ー＞編集フォーム入力ー＞送信 -->

@extends('common')
@section('title')
<title>detail</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/allShops.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<div class="reserve">
    <div class="reserve__title">
        edit shop
    </div>
    <div class="reserve__form">

        <form class="form__wrapper" action="{{ route('editShop') }}" method="POST">
            @csrf

            <div class="form">
                <select name="shop_id" class="form__item--control">
                    <option value="">店舗名を選択してください</option>
                    @foreach($shops as $shop)
                    <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                    @endforeach
                </select>

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

            </div>
            <div class="form__submit">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection