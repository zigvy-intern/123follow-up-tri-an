<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailHotel extends Model
{
  protected $table ='detail_bookhotel';
  protected $fillable =['id_hotel','hotel_slide','hotel_description','hotel_ promotion'];
}
