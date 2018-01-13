<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $table ='hotel_room';
    protected $fillable =['hotel_id','type_room_id','room_price', 'room_numbers','room_booked','room_status'];
}
