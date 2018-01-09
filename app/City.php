<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table ='place_city';
    protected $fillable =['matp','city_name','type'];
}
