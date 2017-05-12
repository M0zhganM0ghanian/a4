
<div class="row">
  <div class="col-sm-12">
    <div class="well">
      <div class="media">
        <div class="media-left">
          <img src="/uploads/pictures/{{ $status->user->getPicture() }}" class="media-object" style="width:60px">
        </div>
        <div class="media-body">
          <h4 class="media-heading">{{ $status->user->getUsername() }}</h4>
          <p>{{  $status->getText() }}</p>
          <ul class="list-inline">
            <li>2 days ago</li>
            <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a></li>
            <li>10 likes</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
