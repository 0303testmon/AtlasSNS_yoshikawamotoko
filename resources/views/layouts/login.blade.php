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

    <!-- jsを使用 -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <!-- ↓この記述でつなげている -->
    <!-- <script src="../../../public/js/script.js"></script> -->
     <!-- <script src="{{ asset('js/script.js') }}"></script> -->

    <!-- アコーディオンメニューcssとjavascript　(bootstrap) -->
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <p>{{Auth::user()->username}}さん<img src="images/icon1.png"></p>
                <div>

                <!--アコーディオンメニュー矢印 -->
                <button type="button" class="menu-btn">
                <span class="inn"></span>
                </button>

        <nav class="menu">
                <ul>
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
        </nav>
            </div>
        </div>
    </header>

    <!--アコーディオンメニュー -->
        <!-- <nav class="navbar bg-body-secondary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/top"><img src="images/atlas.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav me-auto mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/profile">プロフィール</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/logout">ログアウト</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> -->

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>

    <!-- jsを使用 -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    <!-- ↓この記述でつなげている -->
    <!-- <script src="../../../public/js/script.js"></script> -->
     <!-- <script src="{{ asset('js/script.js') }}"></script> -->

</body>
</html>
