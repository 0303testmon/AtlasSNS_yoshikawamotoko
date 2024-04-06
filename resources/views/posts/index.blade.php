@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<div class="container">
{!! Form::open(['url' => '/postcreate']) !!}
  <div>
  <a>
    <img src="images/icon1.png">
  </a>
  <div class="post-main">
      {{ Form::input('text','newPost',null,['required', 'class' =>'form-control','placeholder'=>'投稿内容を入力してください。'])}}
  </div>
<button type="submit" class="post-img">
<img src="images/post.png" width="50px" height="50px" alt="送信">
</button>
    {!! Form::close() !!}
  </div>
  <div class="post-content">
  @foreach($list as $list)
  <tr>
    <td>{{ $list->user_id }}</td>
    <td>{{ $list->post }}</td>
    <br>
    <hr>
  </tr>
  @endforeach
</div>
</div>

@endsection
