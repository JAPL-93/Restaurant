<div class="col-sm-12">
    <div class="row justify-content-between">
        @if (Auth::user()->type_user_id == 1)
        <input type="text" class="form-control col-sm-4 search-query" id="search" placeholder="Search Folio">
        @endif
   </div>
</div>
<br>
