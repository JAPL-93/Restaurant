<div id ="index_table">
  <div class="row">
  <!--table section-->
    <div class="col">
        <div class="table-responsive">          
          <table class="table table-bordered text-center">
            <thead class="head-biopy">
              <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @forelse($data as $user)
                <tr id="User{{$user->id}}">
                  <td>{{ $user->name }} 
                  <td>{{ $user->last_name}}</td>
                  <td>{{ $user->phone}}</td>
                  <td class="btn-td">@include('Users.items.buttons', ['user' => $user])</td>
                </tr>
              @empty
                <tr id="table-row" class="text-center">
                  <th colspan="7" class="text-center no-data">
                      <h1 class="text-biopy">There is no Data</h1>
                  </th>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    <!--pagination section-->
    <div class="col-sm-12">
      <div class="row">
        <div class="col-7">
          <div class="float-left">
            {!! $data->total() !!} {{ trans_choice('Usuario|Users', $data->total()) }}
          </div>
        </div><!--col-->
        <div class="col-5">
          <div class="float-right">
            <br>
              {!! $data->render() !!}
            <br>
          </div>
          </div><!--col-->
      </div><!--row-->
    </div>
  </div>
</div>