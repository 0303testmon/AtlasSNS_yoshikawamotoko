@extends('layouts.login')

@section('content')
    {!! Form::open(['url' => '/follower-list']) !!}

    {{-- フォロワーアイコン --}}
    <h2>フォロワーリスト</h2>
    <div class="container text-center">
        <div class="row">
            @foreach ($followed_users as $followed_user)
                {{-- $userから$followed_userを抽出 --}}
                <div class="col">
                    <a href="{{ URL::to('/otherprofile/' . $followed_user->id) }}"><img
                            src="{{ asset('images/' . $followed_user->images) }}"></a>
                </div>
            @endforeach
        </div>
    </div>
    <hr>

    {{-- フォロワーリスト --}}
    @foreach ($posts as $post)
        {{-- dd($post); --}}
        {{-- {{dd($posts)}} --}}
        <div class="position-relative m-3">
            <a href="{{ URL::to('/otherprofile/' . $post->user_id) }}"><img
                    src=" {{ asset('images/' . $post->user->images) }}"></a>
            <p>名前：{{ $post->user->username }}</p>
            <p>投稿内容：{{ $post->post }}</p>
            <p class="position-absolute top-0 end-0 m-3">{{ $post->updated_at }}</p>
        </div>
        <hr>
    @endforeach
@endsection
