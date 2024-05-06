@extends('layouts.login')

@section('content')


<form method="get" action="#" class="search_container">
  <input type="text" size="25" placeholder="ユーザー名">
  <button type="submit">
  <img src="images/search.png" width="50px" height="50px">
  </button>
</form>
<hr>

    <div class="usercontainer">
        <table>

            @foreach ($users as $user)
            <tr>
                <td>{{ $user->images }}</td>
            </tr>
            <tr>
                <td>{{ $user->username }}</td>
                {{-- <td>{{ $user->follow->following_id }}</td> --}}
            </tr>
            <tr>
            <td><a class="btn btn-following" href="/search/{{$user->id}}/following">フォローする</a></td>
            <td><a class="btn btn-followed" href="/search/{{$user->id}}/followed">フォロー解除</a></td>
            </tr>
            @endforeach
        </table>
    </div>


@endsection
