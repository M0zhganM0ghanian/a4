
<div class="media">
  <div class="media-left">
    <img src="/uploads/pictures/{{ $result->getPicture() }}" class="img-circle" alt="Avatar" style="height:50px; width:50px; right:10px; top:10px; left:10px">
  </div>
  <div class="media-body">
    <h4 class="media-heading">{{ $result->getUsername()}}</h4>
    <p>{{ $result->getName()}}</p>
  </div>
</div>
