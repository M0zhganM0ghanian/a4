@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

                <div class="panel-heading">Find Friends</div>

                <div class="panel-body">
                  <form method='POST' action='/search/{{ Auth::user()->username }}'>
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label>Enter Name</label>
                      <input type='text' class="form-control" name='findFriends' required  id='findFriends' placeholder="Enter Name">
                      <input type='submit' id='btn' class="btn btn-info" value="Submit">
                    </div>
                  </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
