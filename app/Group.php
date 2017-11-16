<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table ='groups';
    protected $fillable =['group_name','leader_name','members', 'job_name'];

    public function User()
    {
        return $this->hasMany('App\User', 'id', 'id');
    }

    public function getViewData()
    {
        return [
        'id' => $this->id,
        'group_name' => $this->group_name,
        'members' => $this->members
      ];
    }
}
