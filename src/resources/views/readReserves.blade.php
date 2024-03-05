@extends('common')
@section('title')
<title>予約一覧</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/readReserves.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<div class="read-reserves">

    <table>
        <thead>
            <tr>
                <th>店舗名</th>
                <th>ユーザーid</th>
                <th>ユーザー名</th>
                <th>予約日</th>
                <th>予約時間</th>
                <th>人数</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reserves as $reserve)
            <tr>
                <td>{{ $reserve->shop->shop_name }}</td>
                <td>{{ $reserve->user->id }}</td>
                <td>{{ $reserve->user->name }}</td>
                <td>{{ $reserve->reserved_date }}</td>
                <td>{{ $reserve->reserved_time }}</td>
                <td>{{ $reserve->number }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection