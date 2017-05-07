<p>timeline statuses</p>
@foreach($friendsStatuses as $status)
  <div class="media">
    <div class="media-left">
      <img src="img_avatar1.png" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">{{ $status->user->getUsername() }}</h4>
      <p>{{  $status->getText() }}</p>
    </div>
  </div>
<hr>
@endforeach
