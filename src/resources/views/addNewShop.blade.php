@extends('common')
@section('title')
<title>店舗追加</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/adminShopContents.css') }}">
@endsection
@section('content')

<div class="adminShopContents">
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="adminShopContents">
        <div class="adminShopContents__title">
            add new shop
        </div>

        <div class="adminShopContents__content">

            <div class="adminShopContents__content--csv-wrapper">
                <form action="{{ route('csvImport') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="adminShopContents__content--csv" style="max-width: 500px; margin: 0 auto;">
                        <h2>csvファイルから追加する場合はこちら</h2>
                        <div class="adminShopContents__content--csv-input">
                            <input type="file" name="csvFile" class="" id="csvFile">
                            <label class="custom-file-label" for="customFile">CSVファイル選択</label>
                        </div>
                    </div>
                    <div class="form__submit">
                        <button>インポート</button>
                    </div>
                </form>
            </div>

            <form class="form__wrapper" action="{{ route('addNewShop') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <h2>直接入力する場合はこちら</h2>
                    <div class="form__item">
                        <input class="form__item--control" type="text" name="shop_name" value="{{ old('name') }}" placeholder="shop name" />
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

</div>

@endsection