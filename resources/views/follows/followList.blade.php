@extends('layouts.login')

@section('content')
    {!! Form::open(['url' => '/follow-list']) !!}

    {{-- フォローアイコン --}}
    <h2>フォローリスト</h2>
    <div class="container text-center">
        <div class="row">
            @foreach ($following_users as $following_user)
                {{-- $userから$following_userを抽出 --}}
                <div class="col">
                    <a href="{{ URL::to('/otherprofile/' . $following_user->id) }}"><img
                            src="{{ asset('images/' . $following_user->images) }}"></a>
                </div>
            @endforeach
        </div>
    </div>
    <hr>

    {{-- フォローリスト --}}
    @foreach ($posts as $post)
        {{-- dd($post); --}}
        <div class="position-relative m-3">
            <a href="{{ URL::to('/otherprofile/' . $post->user_id) }}"><img
                    src=" {{ asset('images/' . $post->user->images) }}"></a>
            <p>名前：{{ $post->user->username }}</p>
            <p>投稿内容：{{ $post->post }}</p>
            <p class="position-absolute top-0 end-0 m-3">{{ $post->updated_at }}</p>
            <hr>
        </div>
    @endforeach
@endsection
