<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table ='devvn_tinhthanhpho';
    protected $fillable =['matp','name','type'];
}
