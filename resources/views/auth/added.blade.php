@extends('layouts.logout')

@section('content')
    <div id="clear">
        <div class="login-content">
            <div class="add-cover">
                <h5>
                    <p>{{ session('username') }}さん</p>
                    <p>ようこそ!AtlasSNSへ</p>
                </h5>
                <br>
                <br>
                <p>ユーザー登録が完了いたしました。</p>
                <p>早速ログインをしてみましょう！</p>
                <br>
                <input href="/login" type="submit" class="btn btn-danger" value="ログイン画面へ">
                {{-- <p class="btn"><a href="/login">ログイン画面へ</a></p> --}}
            </div>
        </div>
    </div>
@endsection
