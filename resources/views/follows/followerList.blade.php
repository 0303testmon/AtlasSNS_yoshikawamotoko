@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follower-list']) !!}

{{-- フォロワーアイコン --}}
<h2>フォロワーリスト</h2>
@foreach($followed_users as $followed_user)
{{-- $userから$followed_userを抽出 --}}
<div>
  @if($followed_user->images == "dawn.png")
  <a href="{{URL::to('/otherprofile')}}"><img src="/images/icon1.png"></a>
  @else
  <a href="{{URL::to('/otherprofile')}}"><img src=" {{ asset('images/'.$followed_user->images)}}"></a>
  @endif
</div>
@endforeach
<hr>

{{-- フォロワーリスト --}}
@foreach($posts as $post)
  {{-- dd($post); --}}
    <a href="{{URL::to('/otherprofile')}}"><img src=" {{ asset('images/'.$followed_user->images)}}"></a>
    <p>名前：{{ $post->user->username }}</p>
    <p>投稿内容：{{ $post->post }}</p>
    <p>{{ $post->update_at }}</p>
    <hr>
@endforeach

@endsection
