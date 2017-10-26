<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $table= 'roles';

    public function User()
    {
        return $this->belongsTo('App\User', 'id', 'id');
    }
}
