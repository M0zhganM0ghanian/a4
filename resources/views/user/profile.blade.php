@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')

<div class="container">
<div class="row">
  <div class="col-sm-3 well">
    <div class="well">
      <h4><strong>{{ $friend->getUsername() }}</strong></h4>
      <img src="/uploads/pictures/{{ $friend->getPicture() }}" class="img-circle" height="200" width="200" alt="Avatar">
      <hr>
      @if(($user->getUsername() == $friend->getUsername()))
        @include('user.uploadPicture')
      @endif
    </div>
    <div class="well">
      <div class="form-group">
        @if(!$friend->getInterests()->count())
          <h4 class="text-danger"><span class="glyphicon glyphicon-info-sign"></span> {{$friend->getUsername()}} has not added any Interests yet</h4>
        @else
          <h4>{{$friend->getUsername()}} is Interested in</h4>
          <hr>
          @foreach( $friend->getInterests() as $i)
                <h4><span class="label label-success">{{ $i->getName() }}</span></h4>
          @endforeach
        @endif
      </div>
    </div>
    <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <p><strong>Ey!</strong></p>
      People are looking at your profile. Find out who.
    </div>
    <div class="list-group">
      <li class="list-group-item">
        @if(!$friend->getFollowing()->count())
            <p class="list-group-item list-group-item-info">{{$friend->getUsername()}} has no following.</p>
        @else
          @include('user.showFollowing')
        @endif
      </li>
      <li class="list-group-item">
        @if(!$friend->getFollower()->count())
            <p class="list-group-item list-group-item-info">{{$friend->getUsername()}} has no follower.</p>
        @else
          @include('user.showFollower')
        @endif
      </li>
      <li class="list-group-item list-group-item-info">
        <p class="text-center"><a href="/allusers">Browse All Users</a></p>
      </li>
    </div>
  </div>
  <div class="col-sm-7">
    <div class="row">
      <div class="col-sm-12">
        <div class="well">
          @if(($user->getUsername() == $friend->getUsername()))
            @include('user/post')
          @else
            <h3>Take a look at {{ $friend->getUsername() }}'s activities</h3>
          @endif
        </div>
      </div>
    </div>
    @foreach($pageOwnerStatuses as $status)
      @include('public.sharedStatuses')
    @endforeach
  </div>
  @if(!($user->getUsername() == $friend->getUsername()))
    <div class="col-sm-2 well">
      @if(!($user->getUsername() == $friend->getUsername()))
        @if($friend->getFollower()->count())
          @if(!$friend->getFollower()->pluck('username')->contains($user->getUsername()))
              <a href="/request/{{ $friend->getUsername()}}" class="btn btn-info" role="button">Follow</a>
          @else
              <a href="/unfollowrequest/{{ $friend->getUsername()}}" class="btn btn-info" role="button">Unfollow</a>
          @endif
        @else
          <a href="/request/{{ $friend->getUsername()}}" class="btn btn-info" role="button">Follow</a>
        @endif
      @endif
    </div>
  @endif
</div>
</div>
 @endsection
