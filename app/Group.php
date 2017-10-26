<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table ='groups';
    protected $fillable =['group_name','leader_name','members', 'job_name','create_day','deadline'];

    public function User()
    {
        return $this->hasMany('App\User', 'id', 'id');
    }
}
