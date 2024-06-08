@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follow-list']) !!}

{{-- フォローアイコン --}}
<h2>フォローリスト</h2>
@foreach($following_users as $following_user)
{{-- $userから$following_userを抽出 --}}
<div>
  @if($following_user->images == "dawn.png")
  <img src="/images/icon1.png">
  @else
  <img src=" {{ asset('images/'.$following_user->images)}}">
  @endif
</div>
@endforeach
<hr>

{{-- フォローリスト --}}
@foreach($posts as $post)
  {{-- dd($post); --}}
    <p>名前：{{ $post->user->username }}</p>
    <p>投稿内容：{{ $post->post }}</p>
    <p>{{ $post->update_at }}</p>
@endforeach

@endsection
