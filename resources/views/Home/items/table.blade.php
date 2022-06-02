<div id="index_table">
   <div class="grid grid-cols-1 md:grid-cols-3 items-center place-content-center">
    @forelse ($data as $item)
    <div class="cardT m-2 overflow-auto">
        <h5>{{ $item->restaurant->name }}</h5>
        <h5>{{ $item->user->name }} {{$item->user->last_name}}</h5>
        <h6>Ubication: <span>{{ $item->ubication_table->ubication_zone->name }},
                Table:{{ $item->ubication_table->table_number }}</span></h6>
        <h6>Folio: <span class="font-bold">{{$item->folio}}</span></h6>
        <h6>In: <span class="font-bold">{{$item->hour->in}}</span></h6>
        <div class="flex flex-row-reverse">
            <button class="btn btn-primary" data-modal-toggle="FormModal" onclick="home.showRev({{$item->id}})">Edit</button>
            <button class="btn btn-danger mr-1" onclick="home.delete({{$item->id}})">Delete</button>
        </div>
    </div>
@empty
    <h2>No reservations</h2>
@endforelse
   </div>
    {!! $data->render() !!}
</div>

