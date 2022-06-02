<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthRepository.
 */
class AuthRepository
{
    /**
     * AuthRepository constructor.
     *
     *
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function storeUser($data)
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
    }
}
