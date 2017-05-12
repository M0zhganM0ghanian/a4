@extends('layouts.app')



@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Find Friends</div>
              <div class="panel-body">
                <form method='POST' action='/search'>
                  {{ csrf_field() }}

                  <div class="form-group">
                    <label>Enter Name</label>
                    <input type='text' class="form-control" name='findFriends' required  id='findFriends' placeholder="Enter Name/Username">
                    <input type='submit' id='btn' class="btn btn-info" value="Submit">
                  </div>
                </form>
              </div>

              <div class="panel-heading">All Users</div>
              <div class="panel-body">
                <div class="list-group">

                  @foreach($users as $result)
                  <div class="list-group-item">
                    <a href="/user/{{ $result->getUsername()}}">@include('user/searchResult')</a>
                  </div>
                  @endforeach

                </div>

              </div>
              </div>
          </div>
      </div>
  </div>
 @endsection
