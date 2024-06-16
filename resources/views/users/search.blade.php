@extends('layouts.login')

@section('content')


{{-- <form method="get" action="#" class="search_container">
  <input type="text" size="25" placeholder="ユーザー名">
  <button type="submit">
  <img src="images/search.png" width="50px" height="50px">
  </button>
</form> --}}
        <form action="/search" method="get">
           @csrf
           <input type="text" name="keyword" class="form" placeholder="ユーザー名">
           {{-- <button type="submit" class="btn btn-success">検索</button> --}}
             <button type="submit">
  <img src="images/search.png" width="50px" height="50px">
  </button>
        </form>
<hr>

{{-- 検索ワードを表示 --}}
@foreach($users as $user)
{{-- 自分以外のユーザーを表示 --}}
@if(isset($user)and!(Auth::user()==$user))
            <tr>
              <td><img src="{{ $user->images }}" alt="ユーザアイコン"></td>
              <td>{{ $user->username }}</td>
                {{-- <td>{{ $user->follow->following_id }}</td> --}}
            </tr>



<input type="hidden" name="user_id" value="{{ $user->username }}">
<button type="submit" class="btn-primary">
  @if(auth()->user()->isFollowing($user->id))
  <a href="{{ route('unfollow', ['userId' => $user->id]) }}" class="btn btn-danger">フォロー解除</a>
  @else
  <a href="{{ route('follow', ['userId' => $user->id]) }}" class="btn btn-primary">フォローする</a>
  @endif
</button>
<br>
@endif



@endforeach
@endsection
