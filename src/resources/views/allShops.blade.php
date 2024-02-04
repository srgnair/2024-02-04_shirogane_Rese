@extends('common')
@section('title')
<title>detail</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/allShops.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<!-- ★にはアイコンを挿入する -->
<!-- このページだけヘッダー違う？そもそもヘッダーとして扱わない？ 上部にメニューあり-->

<div class="all-shops__container">

    <div class="all-shops__serch-menu">
        <input type="search" name="search" placeholder="Search...">
        <!--上記は仮の検索フーム 
            実装はこちらを参考予定https://qiita.com/howaito01/items/7c7ce20410b29337ac63 
        -->
    </div>

    <div class="all-shops">
        @foreach($shops as $shop)
        <div class="all-shops__card">
            <div class="all-shops__card--img">
                <img src="{{ $shop->image }}" alt="イメージ画像">
            </div>
            <div class="all-shops__card--content">
                <div class="shop-name">
                    {{ $shop->shop_name }}
                </div>
                <div class="all-shops__card--tag">
                    <div class="shop-area">
                        #{{ $shop->area }}
                    </div>
                    <div class="shop-genre">
                        #{{ $shop->genre }}
                    </div>
                </div>
                <div class="all-shops__card--footer">
                    <div class="detail-button">
                        
                        <a href="{{ route('detail', ['id' => $shop->id]) }}">詳しくみる</a>
                        
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart" style="color: #BB371A;"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection