@extends('common')
@section('title')
<title>thanks</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/completeReserve.css') }}">
@endsection
@section('content')

<div class="reserve-complete">

    <div class="reserve-complete__title">
        ご予約ありがとうございます
    </div>

    <div class="reserve-complete__link">
        <a href="{{ route('home') }}">戻る</a>
    </div>

</div>

@endsection