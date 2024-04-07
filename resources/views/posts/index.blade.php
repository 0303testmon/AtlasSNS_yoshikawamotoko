@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<div class="container">
  <div class="js-modal">
{!! Form::open(['url' => '/postcreate']) !!}
    <div>
    <a>
    <img src="images/icon1.png"><p>{{Auth::user()->username}}</p>
    </a>
      <div class="post-main">
      {{ Form::input('text','newPost',null,['required', 'class' =>'form-control','placeholder'=>'投稿内容を入力してください。'])}}
      </div>
<button type="submit" class="post-img">
<img src="images/post.png" width="50px" height="50px" alt="送信">
</button>
    {!! Form::close() !!}
    <hr>
    </div>
  {{-- <textarea name="upPost" class="modal_post" value=""></textarea>
  <input type="hidden" name="Id" class="modal_id" value=""> --}}
    <div class="post-content">
    @foreach($list as $list)
    <tr>
      <td>{{ $list->user_id }}</td>
      <td>{{ $list->post }}</td>
      {{-- 編集 --}}
      <td>
        <div class="contents">
          <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}">
            <img src="./images/edit.png" alt="編集"></a>
        </div>
      </td>
    </tr>
      <br>
      <hr>
    @endforeach

    {{-- モーダルの中身 --}}
    <div class="modal js_modal">
      <div class="modal_bg js-modal-close"></div>
        <div class="modal_content">
          <form action="/post/update" method="POST">
            @csrf
          <textarea name="upPost" class="modal_post"></textarea>
          <br>
          <input type="hidden" name="id" class="modal_id" value="">
          {{-- <input type="submit" value="更新">
          <img src="./images/edit.png" alt="編集"> --}}
          <button type="submit" class="modal_img">
          <img src="images/edit.png" width="50px" height="50px" alt="更新">
          </button>
          </form>
          <a class="js-modal-close" href=""></a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
