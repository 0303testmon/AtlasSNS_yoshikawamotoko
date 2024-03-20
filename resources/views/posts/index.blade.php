@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<form class="post" method="POST">

<div>
  <a>
    <img src="images/icon1.png">
  </a>
  <textarea class="post-main" name="post" placeholder="投稿内容を入力してください。" width="1000px"></textarea>
</div>
<button class="post-img">
<img src="images/post.png" width="50px" height="50px">
</button>
</form>

@endsection
