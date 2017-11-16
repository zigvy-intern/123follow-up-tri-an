<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookHotel extends Model
{
  protected $table ='bookhotel';
  protected $fillable =['place','hotel_name','hotel_image'];
}
