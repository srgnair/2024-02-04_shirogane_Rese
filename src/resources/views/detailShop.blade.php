@extends('common')
@section('title')
<title>detail</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/detailShop.css') }}">
@endsection
@section('content')

<!-- ★にはアイコンを挿入する -->

<div class="shop">
    <div class="shop__name">
        <a href="{{ route('home') }}">＜</a>
        {{ $shop->shop_name }}
    </div>
    <div class="shop__img">
        <img src="{{ asset($shop->image) }}" alt="イメージ画像">
    </div>
    <div class="shop__tag">
        <div class="shop__tag--area">
            #{{ $shop->area }}
        </div>
        <div class="shop__tag--category">
            #{{ $shop->genre }}
        </div>
    </div>
    <div class="shop__introduction">
        {{ $shop->introduction }}
    </div>
</div>

@if($existingReserve && $shop->reserves->first()->reserved_at <= \Carbon\Carbon::now() && !$existingReview) <!-- reserveモデルに同じ店舗idを持つ店舗が存在する場合、かつ予約日を過ぎている、かつレビュー未投稿の場合は口コミのフォームを表示 -->

    <div class="reserve">
        <div class="reserve__title">
            レビュー投稿
        </div>
        <div class="reserve__form">

            <form class="form__wrapper" action="{{ route('review', ['shop_id' => $shop->id]) }}" method="POST">
                @csrf

                <div class="form">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                    <div class="radioform__item">

                        <label for="star5">
                            <input type="radio" name="star" value="5" id="star5" class="radioform__item--control">
                            @for($i=0; $i<5; $i++) <i class="fa-solid fa-star fa-2xs" style="color: #FFD43B;"></i>
                                @endfor
                        </label>

                        <label for="star4">
                            <input type="radio" name="star" value="4" id="star4" class="radioform__item--control">
                            @for($i=0; $i<4; $i++) <i class="fa-solid fa-star fa-2xs" style="color: #FFD43B;"></i>
                                @endfor
                        </label>

                        <label for="star3">
                            <input type="radio" name="star" value="3" id="star3" class="radioform__item--control">
                            @for($i=0; $i<3; $i++) <i class="fa-solid fa-star fa-2xs" style="color: #FFD43B;"></i>
                                @endfor
                        </label>

                        <label for="star2">
                            <input type="radio" name="star" value="2" id="star2" class="radioform__item--control">
                            @for($i=0; $i<2; $i++) <i class="fa-solid fa-star fa-2xs" style="color: #FFD43B;"></i>
                                @endfor
                        </label>

                        <label for="star1">
                            <input type="radio" name="star" value="1" id="star1" class="radioform__item--control">
                            @for($i=0; $i<1; $i++) <i class="fa-solid fa-star fa-2xs" style="color: #FFD43B;"></i>
                                @endfor
                        </label>

                    </div>

                    <div class="form__item--textarea">
                        <textarea id="inputDate" class="radioform__item--comment" type="text" name="comment" value="{{ old('email') }}" placeholder="こちらにレビューを入力してください"></textarea>
                    </div>
                </div>
                <div class="form__submit">
                    <button type="submit">投稿する</button>
                </div>

            </form>
        </div>
    </div>

    @elseif($existingReserve && $shop->reserves->first()->reserved_at >= \Carbon\Carbon::now()) <!-- reserveモデルに同じ店舗idを持つ店舗が存在する場合、かつ時間が未来の場合は予約編集のフォームを表示 -->

    <div class="reserve">
        <div class="reserve__title">
            予約編集
        </div>
        <div class="reserve__form">

            <form class="form__wrapper" action="{{ route('reserveEdit', ['shop_id' => $shop->id]) }}" method="POST">
                @csrf

                <div class="form">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                    <div class="form__item">
                        <input id="inputDate" class="form__item--control" type="date" name="reserved_date" value="{{ $shop->reserves->first()->reserved_date }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+6 months')) }}" />
                        <!-- maxの日付の修正 -->
                    </div>

                    <div class="form__item">
                        <select id="selectTime" name="reserved_time" class="form__item--control">
                            <option value="{{ $shop->reserves->first()->reserved_time }}">{{ $shop->reserves->first()->reserved_time }}
                            </option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <select id="selectNumber" name="number" class="form__item--control">
                            <option value="{{ $shop->reserves->first()->number }}">{{ $shop->reserves->first()->number }}</option>
                            <option value="1">1人</option>
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人</option>
                        </select>
                    </div>
                    <div class="reserve__confirm">

                        <!-- javascriptを使用して確認欄 -->

                        <table>
                            <tr>
                                <th>Shop</th>
                                <td>{{ ($shop->shop_name) }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td class="log_date"></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td class="log_time"></td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td class="log_number"></td>
                            </tr>
                        </table>

                        <script src="./script.js"></script>
                        <script src="{{ asset('/js/reserve.js') }}"></script>

                    </div>
                </div>
                <div class="form__submit">
                    <button type="submit">予約する</button>
                </div>
            </form>
        </div>
    </div>

    @else
    <!-- reserveモデルに同じ店舗idを持つ店舗が存在する場合は新規予約のフォームを表示 -->

    <div class="reserve">
        <div class="reserve__title">
            予約
        </div>
        <div class="reserve__form">

            @if (count($errors) > 0)
            以下の内容を確認してください
            @endif
            @error('reserved_date')
            <p>{{$errors->first('reserved_date')}}</p>
            @enderror
            @error('reserved_time')
            <p>{{$errors->first('reserved_time')}}</p>
            @enderror
            @error('number')
            <p>{{$errors->first('number')}}</p>
            @enderror

            <form class="form__wrapper" action="{{ route('reserve') }}" method="POST">
                @csrf

                <div class="form">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">


                    <div class="form__item">
                        <input id="inputDate" class="form__item--control" type="date" name="reserved_date" value="date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+6 months')) }}" />
                        <!-- maxの日付の修正 -->
                    </div>

                    <div class="form__item">
                        <select id="selectTime" name="reserved_time" class="form__item--control">
                            <option value="">time</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <select id="selectNumber" name="number" class="form__item--control">
                            <option value="">number</option>
                            <option value="1">1人</option>
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人</option>
                        </select>
                    </div>
                    <div class="reserve__confirm">

                        <!-- javascriptを使用して確認欄 -->

                        <table>
                            <tr>
                                <th>Shop</th>
                                <td>{{ ($shop->shop_name) }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td class="log_date"></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td class="log_time"></td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td class="log_number"></td>
                            </tr>
                        </table>

                        <script src="./script.js"></script>
                        <script src="{{ asset('/js/reserve.js') }}"></script>

                    </div>
                </div>
                <div class="form__submit">
                    <button type="submit">予約する</button>
                </div>
            </form>
        </div>
    </div>

    @endif

    @endsection