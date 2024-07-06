<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->


    <!-- アコーディオンメニューcssとjavascript　(bootstrap) -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
      </script> -->

</head>

<body>
    <header>
        <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/top"><img style="height:50px;" src="/images/atlas.png"></a>
                <div class="d-flex">
                    <div class="nav-item-user display-9">
                        <p>{{ Auth::user()->username }}　　さん</p>
                    </div>
                    <!--アコーディオンメニュー矢印 -->
                    <button type="button" class="menu-btn">
                        <span class="inn"></span>
                    </button>
                    <nav class="menu">
                        <ul class="menu-ul">
                            <li><a href="/top">ホーム</a></li>
                            <li><a href="/profile">プロフィール</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </nav>
                    <div class="nav-item">
                        <img src="/images/{{ Auth::user()->images }}">
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div class="sidebar-confirm" id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="row">
                    <div class="col">
                        <p>フォロー数　　　{{ Auth::user()->follows()->count() }}人</p>
                    </div>
                    <div class="row">
                        <div class="follow_list col">
                            <a href="/follow-list" class="btn btn-primary">フォローリスト</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <p>フォロワー数　　　 {{ Auth::user()->followers()->count() }}人</p>
                    </div>
                    <div class="row">
                        <div class="follow_list col">
                            <a href="/follower-list" class="btn btn-primary">フォロワーリスト</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="search_list">
                <a href="/search" class="btn btn-primary">ユーザー検索</a>
            </div>
        </div>
    </div>
    <footer>
    </footer>

    <!-- jsを使用 -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- ↓この記述でつなげている -->
    <!-- <script src="../../../public/js/script.js"></script> -->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- BootstrapのCSS読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jQuery読み込み -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrapのjs読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
