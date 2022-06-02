<div class="flex flex-row-reverse">
    @if (Auth::user()->type_user_id == 1)
    <button id="create" class="btn btn-success ml-1 btn-create mb-1" type="button" data-modal-toggle="FormModal" onclick="home.create()">Create Reservation</button>
    @endif
</div>
