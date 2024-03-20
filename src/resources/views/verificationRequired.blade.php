@extends('common')
@section('title')
<title>Login</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<div>
    <p>メール認証が完了していません。</p>
    <p>メール認証を完了するまで、アクセスは制限されています。</p>
</div>

@endsection