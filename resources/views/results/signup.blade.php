@extends('layouts.master')

@section('title')
    Sign Up
@endsection

@push('head')
@endpush

@section('content')
<div class="row">
  <div class="col-sm-3 col-md-6 col-lg-12">
    <form class="form-horizontal" method='POST' action='/signup'>
      {{ csrf_field() }}
      <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
        <label class="control-label col-sm-2" for="firstname">First Name*</label>
        <div class="col-sm-10">
          <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter First Name">
          @if($errors->has('firstname'))
            <div class='alert alert-danger'>
                <li>{{ $errors->first('firstname') }}</li>
            </div>
          @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
        <label class="control-label col-sm-2" for="lastname">Last Name*</label>
        <div class="col-sm-10">
          <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last Name">
          @if($errors->has('lastname'))
            <div class='alert alert-danger'>
                <li>{{ $errors->first('lastname') }}</li>
            </div>
          @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label class="control-label col-sm-2" for="email">Email*</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
          @if($errors->has('email'))
            <div class='alert alert-danger'>
                <li>{{ $errors->first('email') }}</li>
            </div>
          @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
        <label class="control-label col-sm-2" for="username">Username*</label>
        <div class="col-sm-10">
          <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
          @if($errors->has('username'))
            <div class='alert alert-danger'>
                <li>{{ $errors->first('username') }}</li>
            </div>
          @endif
        </div>
      </div>
      <div class="form-group {{ $errors->has('pwd') ? 'has-error' : ''}}">
        <label class="control-label col-sm-2" for="pwd">Password*</label>
        <div class="col-sm-10">
          <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password">
          @if($errors->has('pwd'))
            <div class='alert alert-danger'>
                <li>{{ $errors->first('pwd') }}</li>
            </div>
          @endif
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
          </div>
        </div>
      </div>
      <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
