<!-- add new shop / update shop / read reserves -->

@extends('common')
@section('title')
<title>admin for partner</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/shopAdmin.css') }}">
@endsection
@section('content')

<div class="shop-admin">

    <ul>
        <li>
            <div class="shop-admin__link">
                <a href="{{ route('addNewShop') }}">add new shop</a>
            </div>
        </li>
        <li>
            <div class="shop-admin__link">
                <a href="{{ route('editShopView') }}">edit shop</a>
            </div>
        </li>
        <li>
            <div class="shop-admin__link">
                <a href="{{ route('readReserves') }}">read reserves</a>
            </div>
        </li>
        <li>
            <div class="shop-admin__link">
                <a href="{{ route('sendEmailView') }}">send Email</a>
            </div>
        </li>
    </ul>
</div>

@endsection