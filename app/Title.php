<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table ='title';
    protected $fillable =['title_name','status','created_at', 'updated_at'];
    public $timestamps =true;
}
