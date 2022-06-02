<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProviderRepository.
 */
class GeneralRepository
{
   public  function get_location_and_menu($menu)
   {

     $data['menu'] =$menu;

     return $data;
   }
}
