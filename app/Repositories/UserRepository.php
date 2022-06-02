<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository.
 */
class UserRepository
{
    /**
     * UserRepository constructor.
     *
     * @param  User  $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function take_user_location($location){
        $UserLocation = $this->user_location
                             ->where('id','>',1)
                             ->where('location_id',$location)
                             ->get();
        $ids = [];
        foreach ($UserLocation as $ul) {
            array_push($ids,$ul['user_id']);
        }

        return $ids;
    }

          /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getSearchPaginated($criterion,$search,$status,$profile): LengthAwarePaginator
    {

                    $rg = (strlen($criterion) > 0 &&  strlen($search) > 0)
                    ? $this->model->where('id','>',1)->where('id','!=',Auth::user()->id)->where($criterion, 'like', '%'. $search . '%')
                    : $this->model->where('id','>',1)->where('id','!=',Auth::user()->id);


                    if(Auth::user()->type_user_id == 3){
                        $rg->whereNotIn('type_user_id',[1,2,4]);
                    }

                    if($profile !='all'){
                        $rg->where('type_user_id',$profile);
                    }

                    switch ($status) {
                        case 1:
                            $rg;
                        break;
                        case 'D':
                            $rg->onlyTrashed();
                        break;
                }

                    $Users = $rg->orderBy('id', 'desc')->paginate(10);

            return $Users;
    }


    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return User
     */
    public function create(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $User = $this->model::create([
                'name' => $data['name'],
                'type_user_id'=>$data['type'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'nickname' => $data['nickname'],
                'RFC' => $data['RFC'],
                'birthdate' => $data['birthdate'],
                'password' =>Hash::make(trim($data['password'])),
            ]);

            if ($User) {



                    return $User;

            }

            throw new GeneralException(__('There was an error created the User.'));
        });
    }

    public function createJson(array $data): User
    {
        return DB::transaction(function () use ($data) {
            try {
                $User = $this->model::create([
                    'name' => $data['name'],
                    'type_user_id'=>2,
                    'last_name' => $data['last_name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'nickname' => $data['nickname'],
                    'RFC' => $data['RFC'],
                    'birthdate' => $data['birthdate'],
                    'password' =>Hash::make(trim($data['password'])),
                ]);

                if ($User) {



                        return $User;

                }
            } catch (\Throwable $th) {
                return new User();
            }

            return 'User have a repeat item'. $data['name'] . $data['RFC'];
        });
    }

    /**
     * @param User  $User
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return User
     */
    public function update($User_id, array $data): User
    {

        $User = $this->model->find($User_id);

        return DB::transaction(function () use ($User, $data) {
            if ($User->update([
                'name' => $data['name'],
                'type_user_id'=>$data['type'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
            ])) {



                    return $User;
            }

            throw new GeneralException(__('There was an error updating the User.'));
        });
    }

        /**
     * @param User  $User
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return User
     */
    public function updatePass($User_id, array $data): User
    {

        $User = $this->model->find($User_id);

        return DB::transaction(function () use ($User, $data) {
            if ($User->update([
                'password' =>Hash::make(trim($data['password'])),
            ])) {

                return $User;
            }

            throw new GeneralException(__('There was an error updating password the User.'));
        });
    }

    /*
     * @param User $User
     * @param      $status
     *
     * @throws GeneralException
     * @return User
     */

    public function updateStatus($User_id): User
    {
        $User = $this->model->find($User_id);

        switch ($User->active) {
            case 0:
                $User->active = 1;
            break;
            case 1:
                $User->active = 0;
            break;
        }

        if ($User->save()) {
            return $User;
        }

        throw new GeneralException(__('Error updateStatus of User.'));
    }

    public function deleteOrResotore($User_id)
    {
        $Bval = User::withTrashed()->find($User_id)->trashed();

        return DB::transaction(function () use ($Bval,$User_id) {

          if($Bval){
            $User = User::withTrashed()->find($User_id)->restore();
            $b=4;
        } else{
            $User = User::find($User_id)->delete();
            $b=3;
        }

          if ($b) {
          return $b;
        }

          throw new GeneralException(__('Error deleteOrResotore of User.'));

      });


    }



}
