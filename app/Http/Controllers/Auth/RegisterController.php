<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct(AuthRepository $AuthRespository)
    {
        $this->AuthRepository = $AuthRespository;
    }

    public function register()
      {

        return view('auth.register');
      }

      public function store(RegisterRequest $request)
      {
          $user = $this->AuthRepository->storeUser($request);
          if($user) return $user;
      }
}
