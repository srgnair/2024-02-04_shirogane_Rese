<!-- add new shop / update shop / read reserves -->

@extends('common')
@section('title')
<title>admin for partner</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/detailShop.css') }}">
@endsection
@section('content')

<div class="register-complete">

    <div class="register-complete__link">
        <a href="{{ route('addNewShop') }}">add new shop</a>
    </div>
    <div class="register-complete__link">
        <a href="{{ route('editShopView') }}">edit shop</a>
    </div>
    <div class="register-complete__link">
        <a href="{{ route('readReserves') }}">read reserves</a>
    </div>

</div>

@endsection