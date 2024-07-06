@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"><br></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col end-0">
                <img src=" {{ asset('images/' . $user->images) }}">
            </div>
            <div class="col-6 other-text">
                <p>ユーザー名　　　　　{{ $user->username }}</p>
                <p>自己紹介　　　　　{{ $user->bio }}</p>
            </div>
            <input type="hidden" name="user_id" value="{{ $user->username }}">
            <div class="col">
                @if (auth()->user()->isFollowing($user->id))
                    <a href="{{ route('unfollow', ['userId' => $user->id]) }}" class="btn btn-danger other-btn">フォロー解除</a>
                @else
                    <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-primary other-btn">フォローする</a>
                @endif
            </div>
        </div>
    </div>
    <hr>
    {{-- {{dd($posts)}} --}}
    @foreach ($posts as $post)
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="position-relative">
                        <div class="position-absolute top-0 end-0">{{ $post->updated_at }}</div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src=" {{ asset('images/' . $post->user->images) }}"></a>
                    </div>
                    <div class="col-8">
                        <div class="position-relative">
                            <div class="position-absolute start-0">
                                <p>{{ $post->user->username }}</p>
                            </div>
                            <br>
                            <div class="position-absolute start-0">
                                <p>{{ $post->post }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
@endsection
