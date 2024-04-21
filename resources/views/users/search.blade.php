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
                <td>{{ $user->username }}</td>
                {{-- <td>{{ $user->follow->following_id }}</td> --}}

            </tr>
            @endforeach
        </table>
    </div>


@endsection
