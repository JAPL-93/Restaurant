<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Restaurant extends Model
{
    use HasFactory;

    public function ubication_tables()
    {
        return $this->hasMany('App\Models\Ubication_table', 'restaurant_id', 'id');
    }
}
