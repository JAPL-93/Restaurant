<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'ubication_table_id',
        'ubication_zone_id',
        'restaurant_id',
        'hour_id',
        'day',
        'status',
        'folio',
        'invoce'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function ubication_table()
    {
        return $this->belongsTo('App\Models\Ubication_table','ubication_table_id','id');
    }
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant','restaurant_id','id');
    }
    public function hour()
    {
        return $this->belongsTo('App\Models\TableHour','hour_id','id');
    }
    public function ubication_zone()
    {
        return $this->belongsTo('App\Models\Ubication_zone','ubication_zone_id','id');
    }
}
