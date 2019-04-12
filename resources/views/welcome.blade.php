<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PrivateGallery</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

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
            .item {
              float: left;
              width: 180px;
              margin: 10px;
            }
            .container {
              /* この要素はflexコンテナとなり、子要素は自動的にflexアイテムとなる */
              display: flex;

              /* 横並びに表示する */
              flex-direction: row;

              /* 画面幅に収まらない場合は折り返す */
              flex-wrap: wrap;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">HOME</a>
                    @else
                        <a href="{{ route('login') }}">ADMIN</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="row">
                <div class="title m-b-md" style="margin-top:200px;position: absolute;">
                    Private☆Gallery
                </div>
                </div>


        <div class="row" style="margin-top:300px;">
            <div class="col-md-12 mx-auto">
                <div class="row">
<div class="container">
                             @foreach($items as $item)
<div class="item">
<a href="/detail/{{ $item->id }}">
<p>
@if(empty($item->image))
                                <img src="/img/noimg.png" id="image_thum" width="150">
@else
                                  <img src="{{ $item->image }}" id="image_thum" width="150">
@endif
</p>
                                    <div>{{ ($item->name) }}</div>
                                    <div>{{ ($item->price) }}円</div>
                                    <div style="text-align:left">{{ ($item->description)}}</div>
</a>
</div><!-- item -->
                             @endforeach


</div><!-- container -->
                <div class="row">
                ☆欲しいものが見つからない場合はこちら→<a href="/ordermade">[オーダーメイド]</a>
                </div>

                </div>
            </div>
        </div>
    </div>



            </div>
        </div>
    </body>
</html>
