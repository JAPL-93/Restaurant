<div class="modal fade" id="FormModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="user-form">
          <div class="form-group">
            <label>Name(s):</label>
            <input type="text" id="name" name="name" value="{{$data->name}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Last name(s):</label>
            <input type="text" id="last_name" name="last_name" value="{{$data->last_name}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Nickname(s):</label>
            <input type="text" id="nickname" name="nickname" value="{{$data->nickname}}" class="form-control">
          </div>
          <div class="form-group">
            <label>RFC:</label>
            <input type="text" id="RFC" name="RFC" value="{{$data->RFC}}" class="form-control">
          </div>
          <div class="form-group">
            <label>BirthDate:</label>
            <input type="date" id="birthdate" name="birthdate" value="{{$data->birthdate}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Profile:</label>
            <select class="form-control" id="type" name="type">
              @foreach($type as $t)
              @if($data->type_user_id == $t->id)
              <option value="{{$t->id}}" selected>{{$t->name}}</option>
              @else
              <option value="{{$t->id}}">{{$t->name}}</option>
              @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Phone:</label>
            <input type="number" id="phone" name="phone" value="{{$data->phone}}" class="form-control">
          </div>

          <div class="form-group">
            <label>E-mail:</label>
            <input type="text" id="email" value="{{$data->email}}" name="email" class="form-control">
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-save" onclick="users.save('update',{{$data->id}})">Update <i
            class='fas fa-edit'></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i
            class='fas fa-window-close'></i></button>
      </div>

    </div>
  </div>
</div>
<script>
  $('.js-example-basic-multiple').select2({
    tags: true,
    placeholder: "Update"
  });
</script>
