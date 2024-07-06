@extends('layouts.login')

@section('content')
    <div class="profile_container">
        <div class="update">
            {!! Form::open(['url' => '/profile/update']) !!}
            @csrf
            {{ Form::hidden('id', Auth::user()->id) }}
            <div class="container profile-ichiran">
                <div class="row">
                    <div class="col-4 profile-img">
                        <img class="update-icon" src="/images/{{ Auth::user()->images }}">
                    </div>
                    {{-- <div class="col-3">
                        <div for="name">ユーザー名</div>
                        <br>
                        <div for="mail">メールアドレス</div>
                        <br>
                        <div for="pass">パスワード</div>
                        <br>
                        <br>
                        <div for="name">パスワード確認</div>
                        <br>
                        <div for="name">自己紹介</div>
                        <br>
                        <div for="name">アイコン画像</div>
                        <br>
                    </div>
                    <div class="col-4">
                        <div>
                            <input type="text" name="username"
                                value="{{ Auth::user()->username }}"><!--ログインユーザの情報をvalueを使って初期値に設定-->
                        </div>
                        <br>
                        <div><input type="email" name="mail" value="{{ Auth::user()->mail }}"></div>
                        <br>
                        <div><input type="password" name="password" value=""></div>
                        <br>
                        <div><input type="password" name="password_confirmation" value=""></div>
                        <br>
                        <div><input type="text" name="bio" value="{{ Auth::user()->bio }}"></div>
                        <br>
                        <div><input type="file" name="images"></div>
                        <br>
                        <input type="submit" class="btn btn-danger">
                        {{ Form::token() }}
                        {!! Form::close() !!}
                    </div> --}}

                    <div class="col-5">
                        <div class="update-form">
                            <div class="update-block"><!--ユーザー名-->
                                <label for="name">ユーザー名</label>
                                <input type="text" name="username"
                                    value="{{ Auth::user()->username }}"><!--ログインユーザの情報をvalueを使って初期値に設定-->
                            </div>
                            <br>
                            <div class="update-block"><!--メールアドレス-->
                                <label for="mail">メールアドレス</label>
                                <input type="email" name="mail" value="{{ Auth::user()->mail }}">
                            </div>
                            <br>
                            <div class="update-block"><!--パスワード-->
                                <label for="pass">パスワード</label>
                                <input type="password" name="password" value="">
                            </div>
                            <br>
                            <div class="update-block"><!--パスワード確認用-->
                                <label for="name">パスワード確認</label>
                                <input type="password" name="password_confirmation" value="">
                            </div>
                            <br>
                            <div class="update-block"><!--自己紹介-->
                                <label for="name">自己紹介</label>
                                <input type="text" name="bio" value="{{ Auth::user()->bio }}">
                            </div>
                            <br>
                            <div class="update-block"><!--アイコン画像アップロード-->
                                <label for="name">アイコン画像</label>
                                <input type="file" name="images">
                            </div>
                            <br>
                            <input type="submit" class="btn btn-danger" value="更新">
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
                {{ Form::token() }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
