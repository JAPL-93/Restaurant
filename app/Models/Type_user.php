<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type_user extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];


    public function type_user()
    {
        return $this->hasMany('App\Models\User','type_user_id','id');
    }

     /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status;
    }

    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        return $query->where('active', $status);
    }
}
