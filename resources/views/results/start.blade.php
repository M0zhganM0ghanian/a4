@extends('layouts.master')

@section('title')
    welcome
@endsection

@push('head')
@endpush

@section('content')

<div class="jumbotron text-center">
  <h2>Welcome to Password Generator</h2>
  <p><span class="glyphicon glyphicon-ok-circle"></span> Be more secure</p>
</div>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Why use random password?</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">Check "About" to know more</div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Do you want to try?</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">For start go to "Generate Password" tab</div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Is it not clear enough?</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">Check the "Help" section</div>
    </div>
  </div>
</div>


@endsection
