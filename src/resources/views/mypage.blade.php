@extends('common')
@section('title')
<title>detail</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<!-- ★にはアイコンを挿入する -->

<div class="user-name">
    @if (Auth::check())
    <p>{{ Auth::user()->name }} さん</p>
    @endif
</div>

<div class="container">
    <div class="reserve">
        予約状況

        @foreach($reservations as $reservation)

        <div class="reserve__card">
            <div class="reserve__title">
                <div class="reserve__title--text">
                    <i class="fa-solid fa-clock" style="color: #ffffff;"></i>予約１
                </div>
                <div class="reserve__title--close">
                    <form action="/mypage" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $reservation['id'] }}">
                        <button type="submit">
                            <i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i>
                        </button>
                    </form>
                    <!-- ×ボタンで削除 -->
                </div>
            </div>
            <div class="reserve__item">
                <table>
                    <tr>
                        <th>Shop</th>
                        <td>{{ $reservation->shop->shop_name }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $reservation->reserved_date }}</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>{{ $reservation->reserved_time }}</td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td>{{ $reservation->number }}</td>
                    </tr>
                </table>
            </div>
        </div>

        @endforeach

    </div>

    <div class="favorite">
        お気に入り店舗
        <div class="favorite__wrapper">
            <div class="favorite__card">
                <div class="favorite__card--img">
                    <img src="{{ asset('img/sushi.jpg') }}" alt="">
                </div>
                <div class="favorite__card--content">
                    <div class="shop-name">
                        仙人
                    </div>
                    <div class="favorite__card--tag">
                        <div class="shop-area">
                            ＃東京都
                        </div>
                        <div class="shop-genre">
                            ＃寿司
                        </div>
                    </div>
                    <div class="favorite__card--footer">
                        <div class="detail-button">
                            <button>詳しくみる</button>
                        </div>
                        <div class="heart">
                            <i class="fa-solid fa-heart" style="color: #BB371A;"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="favorite__card">
                <div class="favorite__card--img">
                    <img src="{{ asset('img/sushi.jpg') }}" alt="">
                </div>
                <div class="favorite__card--content">
                    <div class="shop-name">
                        仙人
                    </div>
                    <div class="favorite__card--tag">
                        <div class="shop-area">
                            ＃東京都
                        </div>
                        <div class="shop-genre">
                            ＃寿司
                        </div>
                    </div>
                    <div class="favorite__card--footer">
                        <div class="detail-button">
                            <button>詳しくみる</button>
                        </div>
                        <div class="heart">
                            <i class="fa-solid fa-heart" style="color: #BB371A;"></i>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection