<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table ='hotels';
    protected $fillable =['hotel_name','hotel_owner','hotel_city_id','hotel_district_id','hotel_ward_id','hotel_address','hotel_image'];
}
