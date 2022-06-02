<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubication_table extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant','restaurant_id','id');
    }
    public function ubication_zone()
    {
        return $this->belongsTo('App\Models\Ubication_zone','ubication_zone_id','id');
    }
}
