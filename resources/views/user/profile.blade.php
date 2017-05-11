@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
  <div class="col-sm-3 well">
    <div class="well">
      <p><a href="#">{{ $friend->getUsername() }}</a></p>
      <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
    </div>
    <div class="well">
      <div class="form-group">
        <p><strong>Interests</strong></p>
        @foreach( $user->getInterests() as $i)
              <p><span class="label label-success">{{ $i->getName() }}</span></p>
        @endforeach
      </div>
    </div>
    <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <p><strong>Ey!</strong></p>
      People are looking at your profile. Find out who.
    </div>
    @if(!$friend->getFollowing()->count())
        <p> has no following.</p>
    @else
        @foreach($friend->getFollowing() as $u)
          <p>Following: <a href="/user/{{ $u->getUsername()}}">{{ $u->getUsername() }}</a></p>
        @endforeach
    @endif
    @if(!$friend->getFollower()->count())
        <p> has no follower.</p>
    @else
        @foreach($friend->getFollower() as $u)
          <p>Follower: <a href="/user/{{ $u->getUsername()}}">{{ $u->getUsername() }}</a></p>
        @endforeach
    @endif
    <p><a href="/allusers">All Users</a></p>
  </div>
  <div class="col-sm-7">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default text-left">
          <div class="panel-body">
            @if(($user->getUsername() == $friend->getUsername()))
             @include('user/post')
            @endif
          </div>
        </div>
      </div>
    </div>

    @include('public.sharedStatuses')
    @include('public.followingsStatuses')

    <div class="row">
      <div class="col-sm-3">
        <div class="well">
         <p>Bo</p>
         <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
      </div>
      <div class="col-sm-9">
        <div class="well">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="well">
         <p>Jane</p>
         <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
      </div>
      <div class="col-sm-9">
        <div class="well">
          <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="well">
         <p>Anja</p>
         <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
      </div>
      <div class="col-sm-9">
        <div class="well">
          <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
        </div>
      </div>
    </div>]
  </div>
  <div class="col-sm-2 well">
    <div class="thumbnail">
      <p>Upcoming Events:</p>
      <img src="paris.jpg" alt="Paris" width="400" height="300">
      <p><strong>Paris</strong></p>
      <p>Fri. 27 November 2015</p>
    @if(!($user->getUsername() == $friend->getUsername()))
      @if($friend->getFollower()->count())
        @if(!$friend->getFollower()->pluck('username')->contains($user->getUsername()))
            <a href="/request/{{ $friend->getUsername()}}" class="btn btn-info" role="button">Follow2</a>
        @else
            <a href="/unfollowrequest/{{ $friend->getUsername()}}" class="btn btn-info" role="button">Unfollow</a>
        @endif
      @else
        <a href="/request/{{ $friend->getUsername()}}" class="btn btn-info" role="button">Follow1</a>
      @endif
    @endif
    </div>
    <div class="well">
      <p>ADS</p>
    </div>
    <div class="well">
      <p>ADS</p>
    </div>
  </div>
</div>
</div>
 @endsection
