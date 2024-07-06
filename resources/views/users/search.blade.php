@extends('layouts.login')

@section('content')
    <div class="container  text-center">
        <div class="row">
            <div class="col"><br></div>
        </div>
        <div class="row">
            <div class="col">
                <form action="/search" method="get">
                    @csrf
                    <input type="text" name="keyword" class="form form-username" placeholder="ユーザー名" width="50px"
                        height="70px">
                    <button class="search_btn" type="submit">
                        <img class="search_img" src="images/search.png" width="50px" height="50px" border-radius="10px">
                    </button>
                </form>
            </div>
            <div class="col">
                {{-- 検索ワードを表示 --}}
                @if (!empty($keyword))
                    <p class="form-keyword">検索ワード：{{ $keyword }}</p>
                @endif
            </div>
            <div class="col">
            </div>
        </div>
    </div>

    <hr>

    @foreach ($users as $user)
        {{-- 自分以外のユーザーを表示 --}}
        <div class="container  text-center p-2">
            <div class="row">
                @if (isset($user) and !(Auth::user() == $user))
                    <div class="col">
                    </div>
                    <div class="col">
                        {{-- <div class="position-relative">
                            <div class="position-absolute "> --}}
                        <img style="height:50px;" src=" {{ asset('images/' . $user->images) }}">
                        {{-- </div>
                        </div> --}}
                    </div>
                    <div class="col-3">
                        <div class="position-relative">
                            <div class="position-absolute start-0">
                                {{ $user->username }}</div>
                        </div>
                    </div>
                    {{-- <td>{{ $user->follow->following_id }}</td> --}}
                    <input type="hidden" name="user_id" value="{{ $user->username }}">
                    <div class="col">
                        @if (auth()->user()->isFollowing($user->id))
                            <a href="{{ route('unfollow', ['userId' => $user->id]) }}" class="btn btn-danger">フォロー解除</a>
                        @else
                            <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-primary">フォローする</a>
                        @endif
                    </div>
                    <div class="col">
                    </div>
                @endif
            </div>
        </div>
        {{-- @if (isset($user) and !(Auth::user() == $user))
            <tr>
                <td><img src=" {{ asset('images/' . $user->images) }}"></td>
                <td>{{ $user->username }}</td>
                {{-- <td>{{ $user->follow->following_id }}</td> --}}
        {{-- </tr>
            <input type="hidden" name="user_id" value="{{ $user->username }}">
            @if (auth()->user()->isFollowing($user->id))
                <a href="{{ route('unfollow', ['userId' => $user->id]) }}" class="btn btn-danger">フォロー解除</a>
            @else
                <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-primary">フォローする</a>
            @endif
            <br>
        @endif --}}
    @endforeach
@endsection
