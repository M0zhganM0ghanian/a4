@extends('layouts.app')

@section('content')
  <div class="container">
   <h2>Your Search Results for "{{ Request::input('findFriends')}}"</h2>
   <div class="row">
     <div class="col-lg-12">
       @if(!$findFriends->count())
          <h2>We have not found any similar name</h2>
       @endif
     </div>
   </div>

  <div class="list-group">

    @foreach($findFriends as $result)
    <div class="list-group-item">
      <a href="/user/{{ $username}}/{{ $result->getUsername()}}">@include('user/searchResult')</a><a href="#" class="btn btn-info" role="button">Follow</a>
    </div>
    @endforeach

  </div>

</div>

@endsection
