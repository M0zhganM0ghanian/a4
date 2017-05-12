
<div class="row">
  <div class="col-sm-12">
    <div class="well">
      <div class="media">
        <div class="media-left">
          <img src="/uploads/pictures/{{ $status->user->getPicture() }}" class="media-object" style="width:60px">
        </div>
        <div class="media-body">
          <h4 class="media-heading"><strong>{{ $status->user->getUsername() }}</strong></h4>
          <p>{{  $status->getText() }}</p>
          <ul class="list-inline">
            <li>{{ $status->created_at->diffForHumans()}}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
