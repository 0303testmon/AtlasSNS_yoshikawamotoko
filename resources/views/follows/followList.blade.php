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
                    <a href="{{ URL::to('/otherprofile/' . $following_user->id) }}">
                        {{-- <img src="{{ asset('images/' . $following_user->images) }}"> --}}
                        <img src="/storage/images/{{ $following_user->images }}" style="height:60px;">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <hr>

    {{-- フォローリスト --}}
    @foreach ($posts as $post)
        {{-- dd($post); --}}
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
                        <a href="{{ URL::to('/otherprofile/' . $post->user_id) }}">
                            {{-- <img src=" {{ asset('images/' . $post->user->images) }}"> --}}
                            <img src="/storage/images/{{ $post->user->images }}" style="height:60px;">
                        </a>
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
