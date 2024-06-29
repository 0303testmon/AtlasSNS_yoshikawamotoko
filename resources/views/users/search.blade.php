@extends('layouts.login')

@section('content')
    <form action="/search" method="get">
        @csrf
        <input type="text" name="keyword" class="form" placeholder="ユーザー名">
        <button class="search_btn" type="submit">
            <img src="images/search.png" width="50px" height="50px">
        </button>
    </form>


    {{-- 検索ワードを表示 --}}
    @if (!empty($keyword))
        <p>検索ワード：{{ $keyword }}</p>
    @endif

    <hr>

    @foreach ($users as $user)
        {{-- 自分以外のユーザーを表示 --}}
        @if (isset($user) and !(Auth::user() == $user))
            <tr>
                <td><img src=" {{ asset('images/' . $user->images) }}"></td>
                <td>{{ $user->username }}</td>
                {{-- <td>{{ $user->follow->following_id }}</td> --}}
            </tr>
            <input type="hidden" name="user_id" value="{{ $user->username }}">
            @if (auth()->user()->isFollowing($user->id))
                <a href="{{ route('unfollow', ['userId' => $user->id]) }}" class="btn btn-danger">フォロー解除</a>
            @else
                <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-primary">フォローする</a>
            @endif
            <br>
        @endif
    @endforeach
@endsection
