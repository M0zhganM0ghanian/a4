@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 ">
              <div class="panel panel-default">
                  <div class="panel-heading">Find Status</div>
                  <div class="panel-body">
                    <form method='POST' action='/searchStatus'>
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label>Looking for particulare status? Find it here!</label>
                        <input type='text' class="form-control" name='findStatus' required  id='findFriends' placeholder="Enter Some Keywords">
                        <input type='submit' id='btn' class="btn btn-info" value="Submit">
                      </div>
                    </form>
                  </div>
              </div>
              @foreach($friendsStatuses as $status)
                @include('public.sharedStatuses')
              @endforeach
          </div>
          <div class="col-sm-4 well">
            <div class="panel-heading">What are you interested in?</div>
            <div class="panel-body">
              @foreach( $interest as $i)
                @if(!$user->getInterests()->pluck('name')->contains($i->getName()))
                    <p><a href="addinterest/{{ $i->getName() }}"><span class="glyphicon glyphicon-heart"></span></a>    {{ $i->getName() }} </p>
                    <hr>
                @else
                    <p><a href="removeinterest/{{ $i->getName() }}"><span class="glyphicon glyphicon-erase"></span></a>   {{ $i->getName() }}</p>
                    <hr>
                @endif
              @endforeach
            </div>
          </div>
      </div>
  </div>
@endsection
