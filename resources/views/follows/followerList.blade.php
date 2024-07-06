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
                        <a href="{{ URL::to('/otherprofile/' . $post->user_id) }}"><img
                                src=" {{ asset('images/' . $post->user->images) }}"></a>
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
