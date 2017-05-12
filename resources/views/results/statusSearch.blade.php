@extends('layouts.app')
@section('title')
    Search
@endsection
@section('content')
  <div class="container">
   <h2>Your Search Results for "{{ Request::input('findStatus')}}"</h2>
   <div class="row">
     <div class="col-lg-12">
       @if(!$statusSearchResult->count())
          <h2>We have not found any similar status</h2>
       @endif
     </div>
   </div>
    @foreach($statusSearchResult as $status)
      @include('public.sharedStatuses')
    @endforeach
</div>
@endsection
