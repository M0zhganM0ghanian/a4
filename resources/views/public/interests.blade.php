@extends('layouts.app')

@section('content')

<p> choose interest :</p>

@foreach( $user->getInterests()  as $interest)
      <p><a href="removeinterest/{{ $interest->getName() }}">cancel</a>{{ $interest->getName() }}</p>
@endforeach


    <p> Interests for this user are:</p>

    @foreach( $user->getInterests()  as $interest)
          <p><a href="removeinterest/{{ $interest->getName() }}">cancel</a>{{ $interest->getName() }}</p>
    @endforeach

 @endsection
