<div class="modal fade" id="FormModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="user-form">
          <div class="form-group">
            <label>Name(s):</label>
            <input type="text" id="name" name="name" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Last Name(s):</label>
            <input type="text" id="last_name" name="last_name" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>NickName:</label>
            <input type="text" id="nickname" name="nickname" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>RFC:</label>
            <input type="text" id="RFC" name="RFC" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>BirthDate:</label>
            <input type="date" id="birthdate" name="birthdate" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Profile:</label>
            <select class="form-control" id="type" name="type">
              <option value="" selected>Select a Profile</option>
              @foreach($type as $t)
              <option value="{{$t->id}}">{{$t->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Phone:</label>
            <input type="text" id="phone" name="phone" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>E_mail:</label>
            <input type="text" id="email" value="" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" id="password" value="" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" id="password_confirmation" value="" name="password_confirmation"
              class="form-control">
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-save" onclick="users.save('add')">Create <i
            class='fas fa-plus'></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i
            class='fas fa-window-close'></i></button>
      </div>

    </div>
  </div>
</div>
<script>
  $('.js-example-basic-multiple').select2({
    tags: true,
    placeholder: "Add"
  });
</script>
