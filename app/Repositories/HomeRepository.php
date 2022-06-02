<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Ubication_table;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * Class HomeRepository.
 */
class HomeRepository
{
    /**
     * HomeRepository constructor.
     *
     *
     */
    public function __construct(Reservation $model)
    {
        $this->model = $model;
    }

    public function getSearchPaginated($search, $status): LengthAwarePaginator
    {

        $rg = (strlen($search) > 0)
            ? $this->model->where('folio', 'like', '%' . $search . '%')
            : $this->model->where('id', '>', 0);

        (Auth::user()->restaurant_id > 0)
            ? $rg->where('restaurant_id', Auth::user()->restaurant_id)
            : $rg;
        $rg->where('status', true);
        switch ($status) {
            case 1:
                $rg;
                break;
            case 'D':
                $rg->onlyTrashed();
                break;
        }

        $Reservations = $rg->orderBy('id', 'desc')->paginate(10);
        return $Reservations;
    }

    public function create($data)
    {

        $in = Carbon::parse($data->date);

           if(true){
            return DB::transaction(function () use ($data, $in) {
                $succes = Reservation::create([
                    'user_id' => $data->user_id,
                    'ubication_table_id' => $data->ubication_table_id,
                    'restaurant_id' => $data->restaurant_id,
                    'ubication_zone_id' => $data->ubication_zone_id,
                    'hour_id' => $data->hour_id,
                    'status' => 1,
                    'day' => $in,
                    'folio' => $data->date . Carbon::now() .'RS',
                    'invoce' => ($data->invoce) ? $data->invoce : 0
                ]);
                if($succes){
                    return $succes;
                }
                throw new GeneralException(__('There was an error creating the user.'));
            });
           }

    }
    public function updateTable(Ubication_table $table,$date,$time)
    {
      $occuped = Reservation::where('ubication_table_id',$table->id)
        ->where('ubication_zone_id',$table->ubication_zone_id)
        ->where('day',$date)
        ->where('hour_id',$time)
        ->count();
        ($occuped > 0) ? true: false;
    }
    public function update($data,$id)
    {
        $reservation = Reservation::find($id);
        return DB::transaction(function () use ($data, $reservation) {

            $succes = $reservation->update([
                'user_id' => $data->user_id,
                'ubication_table_id' => $data->ubication_table_id,
                'restaurant_id' => $data->restaurant_id,
                'ubication_zone_id' => $data->ubication_zone_id,
                'hour_id' => $data->hour_id,
                'status' => 1,
                'day' => Carbon::parse($data->date),
                'invoce' => ($data->invoce) ? $data->invoce : 0
            ]);
            if($succes){
                return $reservation;
            }
            throw new GeneralException(__('There was an error creating the user.'));
        });
    }
    public function delete($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
    }

    /* public function storeUser($data)
    {

        return DB::transaction(function () use ($data) {

            $user = $this->model::create([
                'name' => $data->name,
                'last_name' => $data->last_name,
                'email' => $data->email,
                'phone' => $data->phone,
                'password' => Hash::make($data->password),
                'nickname' => $data->nickname,
                'RFC' => $data->RFC,
                'birthdate' => $data->birthdate,
            ]);
            if($user) return $user;
            throw new GeneralException(__('There was an error creating the user.'));
        });
    }*/
}
