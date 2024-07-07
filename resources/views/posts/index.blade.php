@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="js-modal">
            {!! Form::open(['url' => '/postcreate']) !!}
            {{-- {!! Form::open(['url' => '/postcreate', 'enctype' => 'multipart/form-data']) !!} --}}
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col"><br></div>
                    </div>
                    <div class="row">
                        {{-- <div class="col">
                        </div> --}}
                        <div class="col post-img-icon">
                            <img src="/storage/images/{{ Auth::user()->images }}" style="height:60px;">
                            {{-- <img src="images/{{ Auth::user()->images }}"> --}}
                        </div>
                        {{-- <p>{{ Auth::user()->username }}</p> --}}

                        <div class="col-3 post-main">
                            {{ Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}
                        </div>
                        <div class="col">
                            <button type="submit" class="post-img">
                                <img class="post-imges" src="images/post.png" width="50px" height="50px" alt="送信">
                            </button>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

                <hr>
            </div>
            {{-- <textarea name="upPost" class="modal_post" value=""></textarea>
  <input type="hidden" name="Id" class="modal_id" value=""> --}}
            <div class="post-content">
                <div class="container">
                    @foreach ($list as $list)
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <div class="position-absolute top-0 end-0">{{ $list->updated_at }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><br></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col post-img-icon">
                                        <img src="/storage/images/{{ $list->user->images }}" style="height:60px;">
                                        {{-- <img src=" {{ asset('images/' . $list->user->images) }}"> --}}
                                    </div>
                                    <div class="col-8">{{ $list->user->username }}<br>{{ $list->post }}</div>
                                </div>
                            </div>
                            @if (Auth::user()->id == $list->user_id)
                                {{-- 編集 サイズ小さく、自分のだけ削除、編集 --}}
                                <div class="col">
                                    <div class="d-flex justify-content-end buttom-0">
                                        <div class="contents">
                                            <a class="js-modal-open" href="" post="{{ $list->post }}"
                                                post_id="{{ $list->id }}">
                                                <img style="height:50px;" src="./images/edit.png" alt="編集"></a>
                                        </div>
                                        {{-- 削除 --}}
                                        <div>
                                            <a href="/post/{{ $list->id }}/delete" post_id="{{ $list->id }}/delete"
                                                onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')">
                                                <img style="height:50px;" src="./images/trash.png" alt="削除"
                                                    onmouseover="this.src='./images/trash-h.png'"
                                                    onmouseout="this.src='./images/trash.png'"></a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col">
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col"><br></div>
                        </div>
                        <hr>
                    @endforeach
                </div>

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
                                <img src="images/edit.png" width="100%" alt="更新">
                            </button>
                        </form>
                        <a class="js-modal-close" href=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
