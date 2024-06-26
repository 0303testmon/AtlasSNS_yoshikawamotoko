@extends('layouts.login')

@section('content')
    <img src=" {{ asset('images/' . $user->images) }}">
    <p>ユーザー名　　　　　{{ $user->username }}</p>
    <p>自己紹介　　　　　{{ $user->bio }}</p>
    <input type="hidden" name="user_id" value="{{ $user->username }}">
    @if (auth()->user()->isFollowing($user->id))
        <a href="{{ route('unfollow', ['userId' => $user->id]) }}" class="btn btn-danger">フォロー解除</a>
    @else
        <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-primary">フォローする</a>
    @endif
    <hr>
    {{-- {{dd($posts)}} --}}
    @foreach ($posts as $post)
        <div class="position-relative m-3">
            <img src=" {{ asset('images/' . $post->user->images) }}">
            <p>{{ $post->user->username }}</p>
            <p>{{ $post->post }}</p>
            <p class="position-absolute top-0 end-0 m-3">{{ $post->updated_at }}</p>
        </div>
        <hr>
    @endforeach
@endsection
