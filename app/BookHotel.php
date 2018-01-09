<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookHotel extends Model
{
    protected $table ='book_hotel';
    protected $fillable =['city_id','district_id','ward_id','id_hotel','hotel_address_id','hotel_customer','hotel_identity_card','hotel_cus_phone','hotel_type_room','hotel_check_in','hotel_check_out','hotel_number_day','hotel_price','hotel_total_price'];
}
