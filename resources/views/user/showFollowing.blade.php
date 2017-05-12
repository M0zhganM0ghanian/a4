<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><span class="badge">{{$friend->getFollowing()->count()}}</span> Following</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Following</h4>
      </div>
      <div class="modal-body">
        @foreach($friend->getFollowing() as $u)
          <img src="/uploads/pictures/{{ $u->getPicture() }}" class="img-circle" alt="Avatar" style="height:32px; width:32px; right:10px; top:10px; left:10px">
          <p><a href="/user/{{ $u->getUsername()}}">{{ $u->getUsername() }}</a></p>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
