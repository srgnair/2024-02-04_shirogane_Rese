<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
    @yield('css')
</head>

<body>
    <div class="wrapper">

        <header>
            @if(Auth::check() && Auth::user()->role === 'mainAdmin')

            <div class="hamburger" id="hamburger">
                <i class="fa-solid fa-bars"></i>
                <div class="hamburger__logo">Rese</div>
            </div>

            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger-menu__close" id="close">
                    <span class="hamburger-menu__square_btn"></span>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <form action="/logout" method="post">
                        @csrf
                        <li>
                            <button class="hamburger-menu__button">
                                Logout
                            </button>
                        </li>
                    </form>
                    <li>
                        <a href="{{ route('mypage') }}">Mypage</a>
                    </li>
                    <li>
                        <a href="{{ route('addNewPartnerView') }}">Add new partner</a>
                    </li>
                </ul>
            </div>
            <script src="./script.js"></script>
            <script src="{{ asset('/js/hamburger.js') }}"></script>

            @elseif(Auth::check() && Auth::user()->role === 'shopAdmin')

            <div class="hamburger" id="hamburger">
                <i class="fa-solid fa-bars"></i>
                <div class="hamburger__logo">Rese</div>
            </div>

            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger-menu__close" id="close">
                    <span class="hamburger-menu__square_btn"></span>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <form action="/logout" method="post">
                        @csrf
                        <li>
                            <button class="hamburger-menu__button">
                                Logout
                            </button>
                        </li>
                    </form>
                    <li>
                        <a href="{{ route('mypage') }}">Mypage</a>
                    </li>
                    <li>
                        <a href="{{ route('shopAdminView') }}">Admin</a>
                    </li>
                </ul>
            </div>
            <script src="./script.js"></script>
            <script src="{{ asset('/js/hamburger.js') }}"></script>

            @elseif (Auth::check())

            <div class="hamburger" id="hamburger">
                <i class="fa-solid fa-bars"></i>
                <div class="hamburger__logo">Rese</div>
            </div>

            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger-menu__close" id="close">
                    <span class="hamburger-menu__square_btn"></span>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <form action="/logout" method="post">
                        @csrf
                        <li>
                            <button class="hamburger-menu__button">
                                Logout
                            </button>
                        </li>
                    </form>
                    <li>
                        <a href="{{ route('mypage') }}">Mypage</a>
                    </li>
                </ul>
            </div>
            <script src="./script.js"></script>
            <script src="{{ asset('/js/hamburger.js') }}"></script>

            @else

            <div class="hamburger" id="hamburger">
                <i class="fa-solid fa-bars"></i>
                <div class="hamburger__logo">Rese</div>
            </div>

            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger-menu__close" id="close">
                    <span class="hamburger-menu__square_btn"></span>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Registration</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
            <script src="./script.js"></script>
            <script src="{{ asset('/js/hamburger.js') }}"></script>

            @endif

        </header>

        <main>
            @yield('content')
        </main>

    </div>
</body>

</html>