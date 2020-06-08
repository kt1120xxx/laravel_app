<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>掲示板</title>

        <!-- jquery適用 -->
        <script src="{{ asset('js/topreserve.js') }}"></script>
        <!-- css適用 -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="end"></div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   掲示板アプリ
                </div>

                <span class="links">
                    <a href="https://ta-chal.com/">Blog</a>
                </span>
                <span class="links">
                    <a href="https://app.ta-chal.com/login">Laravel</a>
                </span>
                <span class="links">
                    <a href="https://app.ta-chal.com/vue-top">vue.js</a>
                </span>
                <span class="links">
                    <a href="https://app.ta-chal.com/task">Task,English</a>
                </span>

            </div>
        </div>
    </body>
</html>
