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
        <div class="flex-center position-ref full-height" style="background-image: url({{asset('images/banner.jpg')}})">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
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
                @if($makanans->count()>0)
                <div class="col-md-8 col-md-offset-2">
                    <center>
                        <h1>Makanan</h1>
                    </center>
                </div>
                @endif
                @foreach($makanans as $makanan)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>{{$makanan->nama_menu}}</h3>
                            <h6>by : <b>{{$user->getName($makanan->user_id)}}</b></h6>
                            <h2>Rp. <b>{{$makanan->harga_menu}}</b></h2>
                        </div>
                        <div class="panel-body">
                            <b>
                                {{$makanan->deskripsi_menu}}
                            </b>
                        </div>
                        <div class="panel-footer" style="text-align:right">
                            <b>{{$makanan->stok_menu}} tersisa &nbsp;</b>
                            <a href="{{route('pemesanan',$makanan->id)}}" class="btn btn-info">Pesan</a> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                @if($minumans->count()>0)
                <div class="col-md-8 col-md-offset-2">
                    <center>
                        <h1>Minuman</h1>
                    </center>
                </div>
                @endif
                @foreach($minumans as $minuman)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>{{$minuman->nama_menu}}</h3>
                            <h6>by : <b>{{$user->getName($minuman->user_id)}}</b></h6>
                            <h2>Rp. <b>{{$minuman->harga_menu}}</b></h2>
                        </div>
                        <div class="panel-body">
                            <b>
                                {{$minuman->deskripsi_menu}}
                            </b>
                        </div>
                        <div class="panel-footer" style="text-align:right">
                            <b>{{$minuman->stok_menu}} tersisa &nbsp;</b>
                            <a href="{{route('pemesanan',$minuman->id)}}" class="btn btn-info">Pesan</a> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
