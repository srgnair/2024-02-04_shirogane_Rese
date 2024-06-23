@extends('common')
@section('title')
<title>home</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/allShops.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<div class="all-shops__container">

    <div class="all-shops__serch-menu">

        <form action="{{ route('home') }}" method="GET">
            @csrf

            @if(Auth::user()->role === 'user' | NULL)
            <select name="sort_by" id="sort_by">
                <option value="default">選択してください</option>
                <option value="random">ランダム</option>
                <option value="high">評価が高い順</option>
                <option value="low">評価が低い順</option>
            </select>
            @endif

            <select name="area">
                <option value="">All area</option>
                <option value="1">東京都</option>
                <option value="2">大阪府</option>
                <option value="3">福岡県</option>
            </select>

            <select name="genre">
                <option value="">All genre</option>
                <option value="1">イタリアン</option>
                <option value="2">ラーメン</option>
                <option value="3">居酒屋</option>
                <option value="4">寿司</option>
                <option value="5">焼肉</option>
            </select>

            <input type="text" name="keyword" placeholder="Search...">

            <input type="submit" value="検索">

        </form>

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

                        <a href="{{ route('detail', ['shop_id' => $shop->id]) }}">詳しくみる</a>

                    </div>
                    <div class="heart">
                        @if(Auth::check() && Auth::user()->is_like($shop->id))
                        <form action="{{ route('deleteLike', ['shop_id' => $shop->id] ) }}" method="POST" class="mb-4">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="shop_id" value="{{$shop->id}}">
                            <button type="submit">
                                <i class="fa-solid fa-heart fa-2xl" style="color: #BB371A;"></i>
                            </button>
                        </form>
                        @else
                        <form action="{{ route('like', ['shop_id' => $shop->id])  }}" method="POST" class="mb-4">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{$shop->id}}">
                            <button type="submit">
                                <i class="fa-regular fa-heart fa-2xl"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection