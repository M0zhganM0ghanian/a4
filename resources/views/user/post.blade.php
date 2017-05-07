<form method='POST' action='/share'>
  {{ csrf_field() }}

  <div class="form-group">
    <label>Tell us something...</label>
    <textarea class="form-control" name='status' required  id='status'
      placeholder="Share your thought"></textarea>
    <input type='submit' id='btn' class="btn btn-info" value="Share">
  </div>
</form>
