@extends('common')
@section('title')
<title>口コミ投稿</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/postReview.css') }}">
<script src="{{ asset('js/characterCount.js') }}" defer></script>
<script src="{{ asset('js/reviewForm.js') }}" defer></script>
@endsection
@section('content')

<form action="{{ route('postReview', ['shop_id' => $shop_id]) }}" method="POST" enctype="multipart/form-data" id="reviewForm">
    @csrf
    <div class="review">
        <div class="review__left">
            <div class="review__left--text">
                今回のご利用はいかがでしたか？
            </div>
            <div class="review__left--shop-card">
                <div class="card__img">
                    <img src="{{ asset($shop->image) }}" alt="イメージ画像">
                </div>
                <div class="card__content">
                    <div class="card__content--shop-name">
                        {{ $shop->shop_name }}
                    </div>
                    <div class="card__content--tag">
                        <div>
                            #{{ $shop->area }}
                        </div>
                        <div>
                            #{{ $shop->genre }}
                        </div>
                    </div>
                    <div class="card__content--footer">
                        <div class="footer__button">
                            <a href="{{ route('detail', ['shop_id' => $shop->id]) }}">詳しくみる</a>
                        </div>
                        <div class="footer__like">
                            @if(Auth::check() && Auth::user()->is_like($shop->id))
                            <i class="fa-solid fa-heart fa-2xl" style="color: #BB371A;"></i>
                            @else
                            <i class="fa-regular fa-heart fa-2xl"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="review__right">
            <div class="review__right--star-wrapper">
                <div class="review__right--title">
                    体験を評価してください
                </div>
                @error('user_id')
                <p>{{$errors->first('user_id')}}</p>
                @enderror
                @error('shop_id')
                <p>{{$errors->first('shop_id')}}</p>
                @enderror
                @error('star')
                <p>{{$errors->first('star')}}</p>
                @enderror
                @error('comment')
                <p>{{$errors->first('comment')}}</p>
                @enderror
                @error('image')
                <p>{{$errors->first('image')}}</p>
                @enderror
                <div id="app">
                    <star-rating v-model="rating" active-color="#3f5fec"></star-rating>
                    <input type="hidden" name="star" :value="rating" v-model="rating">
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
                <script src="https://unpkg.com/vue-star-rating/dist/VueStarRating.umd.min.js"></script>
                <script src="{{ asset('js/star.js') }}"></script>
            </div>
            <div class="review__right--input-review-wrapper">
                <div class="review__right--title">
                    口コミを投稿
                </div>
                <div class="review__right--textarea">
                    <textarea name="comment" placeholder="カジュアルな夜のお出かけにおすすめのスポット" onkeyup="ShowLength(value)"></textarea>
                    <div class=" textarea__char-count">
                        <p id="inputlength">0/400 (最高文字数)</p>
                    </div>
                </div>
            </div>
            <div class="review__right--add-img-wrapper">
                <div class="review__right--title">
                    画像の追加
                </div>
                <div class="review__right--add-img" id="dragDropArea">
                    <label for="fileInput" id="fileInputLabel">
                        <p>クリックして写真を追加</p>
                        <input id="fileInput" type="file" accept="image/*" name="image" onChange="imagePreview(event)" multiple>
                        <p>またはドラッグアンドドロップ</p>
                    </label>
                    <div id="previewArea"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="button-submit">
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        <button type="submit">口コミを投稿</button>
    </div>
</form>
@endsection