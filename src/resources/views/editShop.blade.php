@extends('common')
@section('title')
<title>店舗情報編集</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/adminShopContents.css') }}">
@endsection
@section('content')

<div class="adminShopContents">
    <div class="adminShopContents__title">
        edit shop
    </div>
    <div class="adminShopContents__content">

        <form class="form__wrapper" action="{{ route('editShop') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form">

                <div class="form__item">
                    <select name="shop_id" class="form__item--control">
                        <option value="">店舗名を選択してください</option>
                        @foreach($shops as $shop)
                        <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form__item">
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
                    <textarea id="inputIntroduction" class="radioform__item--comment" type="text" name="introduction" value="{{ old('introduction') }}" placeholder="こちらに紹介文を入力してください"></textarea>
                </div>

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

@endsection