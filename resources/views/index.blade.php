<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DuCaJek | Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
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
        <div class="flex-center position-ref full-height" style="background-image: url(http://zaker.ru/foo/10/minimalizm_fon_fioletovyy_oblaka_2560x1600.jpg)">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content" style="color:white">
                <div class="title m-b-md">
                    DuCaJek
                </div>

                <div class="links">
                    <!-- <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> -->
                    <p style="font-size: 30px;">
                        Udinus Cafe dan Ojek
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if($menus->count()>0)
                <div class="col-md-8 col-md-offset-2">
                    <center>
                        <h1>Makanan</h1>
                    </center>
                </div>
                @endif
                @foreach($menus as $menu)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>{{$menu->nama_menu}}</h3>
                            <h6>by : <b>{{$user->getName($menu->user_id)}}</b></h6>
                            <h2>Rp. <b>{{$menu->harga_menu}}</b></h2>
                        </div>
                        <div class="panel-body">
                            {{$menu->deskripsi_menu}}
                        </div>
                        <div class="panel-footer" style="text-align:right">
                            <b>{{$menu->stok_menu}} tersisa &nbsp;</b>
                            <a href="#" class="btn btn-info">Pesan</a> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
