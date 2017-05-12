<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myPhotoModal">Update Picture</button>

<!-- Modal -->
<div class="modal fade" id="myPhotoModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose your Profile Photo</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method='POST' action='/updateInfo'>
          {{ csrf_field() }}
          <label> Update profile Picture </label>
          <input type="file" name="picture" class="form-control" id="image">
          <input type='submit' id='btn' class="btn btn-info" value="Update">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
