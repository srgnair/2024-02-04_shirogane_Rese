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

        @foreach($reservations as $key => $reservation)

        <div class="reserve__card">
            <div class="reserve__title">
                <div class="reserve__title--text">
                    <i class="fa-solid fa-clock fa-xl" style="color: #ffffff;"></i>
                    <p>予約 {{ $key + 1 }}</p>
                </div>
                <div class="reserve__title--close">
                    <form action="/mypage" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $reservation['id'] }}">
                        <button type="submit">
                            <i class="fa-regular fa-circle-xmark fa-2xl" style="color: #ffffff;"></i>
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

            @foreach($likes as $like)

            <div class="favorite__card">
                <div class="favorite__card--img">
                    <img src="{{ $like->shop->image }}" alt="">
                </div>
                <div class="favorite__card--content">
                    <div class="shop-name">
                        {{ $like->shop->shop_name }}
                    </div>
                    <div class="favorite__card--tag">
                        <div class="shop-area">
                            #{{ $like->shop->area }}
                        </div>
                        <div class="shop-genre">
                            #{{ $like->shop->genre }}
                        </div>
                    </div>
                    <div class="favorite__card--footer">
                        <div class="detail-button">
                            <a href="{{ route('detail', ['id' => $like->shop->id]) }}">詳しくみる</a>
                        </div>
                        <div class="heart">
                            @if(Auth::check() && Auth::user()->is_like($like->shop->id))
                            <form action="{{ route('deleteLike', ['shop_id' => $like->shop->id] ) }}" method="POST" class="mb-4">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="shop_id" value="{{$like->shop->id}}">
                                <button type="submit">
                                    <i class="fa-solid fa-heart fa-2xl" style="color: #BB371A;"></i>
                                </button>
                            </form>
                            @else
                            <form action="{{ route('like', ['shop_id' => $like->shop->id])  }}" method="POST" class="mb-4">
                                @csrf
                                <input type="hidden" name="shop_id" value="{{$like->shop->id}}">
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

</div>

@endsection