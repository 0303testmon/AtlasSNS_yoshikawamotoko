@extends('layouts.logout')

@section('content')
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => '/login']) !!}
    <div class="login-content">
        <p>AtlasSNSへようこそ</p>
        <br>
        <div class="login-mail"><label for="mail">メールアドレス</label></div>
        {{-- {{ Form::label('メールアドレス') }}<br> --}}
        {{-- <input type="email" name="mail" value="{{ Auth::user()->mail }}"> --}}
        {{ Form::text('mail', null, ['class' => 'input']) }}
        <br>
        <br>
        <div class="login-password">
            {{ Form::label('パスワード') }}<br></div>
        {{ Form::password('password', ['class' => 'input']) }}
        <br>
        <br>
        <input type="submit" class="btn btn-danger login-btn" value="ログイン">
        {{-- {{ Form::submit('ログイン') }} --}}
        <br>
        <div class="login-sinki">
            <br>
            <p><a href="/register">新規ユーザーの方はこちら</a></p>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
