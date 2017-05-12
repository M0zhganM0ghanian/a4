@extends('layouts.app')

@section('title')
    Search
@endsection

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
      <a href="/user/{{ $result->getUsername()}}">@include('user/searchResult')</a>
    </div>
    @endforeach

  </div>

</div>

@endsection
