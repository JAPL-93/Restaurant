<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Ubication_table;
use App\Models\Ubication_zone;
use App\Models\Reservation;
use App\Models\TableHour;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\GeneralRepository;
use App\Repositories\HomeRepository;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use League\CommonMark\Extension\Table\Table;

class HomeController extends Controller
{
    public function __construct(GeneralRepository $GeneralRepository, HomeRepository $HomeRepository)
    {
        $this->GeneralRepository = $GeneralRepository;
        $this->HomeRepository = $HomeRepository;
        $this->middleware('auth');
        $this->menu_id = 1;
    }

    public function home(Request $request)
    {
        $search = trim($request->search);
        $status = ($request->status) ? $request->status : 1;
        $data = $this->HomeRepository->getSearchPaginated($search, $status);

        if ($request->ajax()) {
            return view('Home.items.table', ['data' => $data]);
        }
        return view('Home.home', ['dm' => accesUrl(Auth::user(), $this->menu_id), 'data' => $data]);
    }

    public function locationMenu(Request $request)
    {
        return response()->json($this->GeneralRepository->get_location_and_menu($this->menu_id));
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $restaurant = Restaurant::all();
            $zone = Ubication_zone::all();
            $users = User::where('type_user_id', 2)->get();
            $data = [
                'restaurans' => $restaurant,
                'ubication_zones' => $zone,
                'users' => $users
            ];
            return response()->json($data, 200);
        }
    }
    public function dateTable(Request $request)
    {
        if ($request->ajax()) {
            $hours = [];
            $data = [];
            $occuped = Reservation::where('ubication_table_id', $request->id)
                ->where('ubication_zone_id', $request->ubication_zone_id)
                ->where('day', $request->date)
                ->get();
                $count = Reservation::where('ubication_table_id', $request->id)
                ->where('ubication_zone_id', $request->ubication_zone_id)
                ->where('day', $request->date)
                ->count();
            if($count >0){
                foreach ($occuped as $value) {
                    $oc = TableHour::where('id',$value->hour_id)->first();
                    array_push($data,$oc->id);
                }
               $time = TableHour::whereNotIn('id',$data)->get();
               return response()->json($time, 200);
            }else{
                $time = TableHour::all();
                return response()->json($time, 200);
            }


        }
    }
    public function ubicationtable(Request $request)
    {
        if ($request->ajax()) {
            $tables = Ubication_table::where('restaurant_id', $request->id)
                ->where('status', 0)
                ->where('ubication_zone_id', $request->ubication_zone_id)
                ->get();
            $data = [
                'tables' => $tables,
            ];
            return response()->json($data, 200);
        }
    }

    public function store(Request $request)
    {
        $time = Carbon::now('America/Mexico_City')->format('H:i:m');
        $init = Carbon::createFromTime(13, 0, 0)->format('H:i:m');
        $end = Carbon::createFromTime(22, 30, 0)->format('H:i:m');
        $open = ($time >= $init && $time <= $end) ? true : false;
        if ($open) {
            $data = $this->HomeRepository->create($request);
            return response()->json(['data'=>$data,'st' => '1'], 202);
        } else {
            return response()->json(['message' => 'No esta en horario laboral','st'=>'0'], 200);
        }
    }
    public function showRev(Request $request, $id)
    {
        if($request->ajax())
        {
            $time = '';
            $data = [];
            $rev = Reservation::with(['user','hour','ubication_zone','ubication_table','restaurant'])->find($id);
            $occuped = Reservation::where('ubication_table_id', $rev->ubication_table_id)
                ->where('ubication_zone_id', $rev->ubication_zone_id)
                ->where('day', $rev->day)
                ->get();
                $count = Reservation::where('ubication_table_id', $rev->ubication_table_id)
                ->where('ubication_zone_id', $rev->ubication_zone_id)
                ->where('day', $rev->day)
                ->count();
            if($count >0){
                foreach ($occuped as $value) {
                    $oc = TableHour::where('id',$value->hour_id)->first();
                    array_push($data,$oc->id);
                }
               $time = TableHour::whereNotIn('id',$data)->get();
            }else{
                $time = TableHour::all();
            }
            $dataSend = [
                'reservation' => $rev,
                'restaurant' => Restaurant::all(),
                'ubication_zone' => Ubication_zone::all(),
                'ubication_table' => Ubication_table::where('restaurant_id',$rev->restaurant_id)->get(),
                'hour' => $time
            ];
            return response()->json($dataSend, 200);
        }
    }
    public function update(Request $request, $id)
    {
        $data = $this->HomeRepository->update($request,$id);
            return response()->json(['data'=>$data,'st' => '1'], 200);
    }

    public function delete(Request $request,$id)
    {
        $data = $this->HomeRepository->delete($id);
        return response()->json($data, 200);
    }
}
