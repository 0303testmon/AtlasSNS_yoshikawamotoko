@extends('layouts.logout')

@section('content')
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => '/register']) !!}
    <div class="login-content">
        <div class="register-cover">
            <p>新規ユーザー登録</p>
            <div class="login-content-komoku">
                <div class="login-user">
                    {{ Form::label('ユーザー名') }}<br></div>
                {{ Form::text('username', null, ['class' => 'input']) }}
                <br>
                <br>
                <div class="login-mail">{{ Form::label('メールアドレス') }}<br></div>
                {{ Form::text('mail', null, ['class' => 'input']) }}
                <br>
                <br>
                <div class="login-password">{{ Form::label('パスワード') }}<br></div>
                {{ Form::password('password', null, ['class' => 'input']) }}
                <br>
                <br>
                <div class="login-password-kakunin">{{ Form::label('パスワード確認') }}<br></div>
                {{ Form::password('password_confirmation', null, ['class' => 'input']) }}
                <br>
                <br>
            </div>
            <input type="submit" class="btn btn-danger login-btn" value="新規登録">
            {{-- {{ Form::submit('登録') }} --}}
            <br><br>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <p><a class="login-sinki" href="/login">ログイン画面へ戻る</a></p>
        </div>
    </div>
    {!! Form::close() !!}


@endsection
