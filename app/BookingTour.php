<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTour extends Model
{
    protected $table ='booking_tour';
    protected $fillable =['book_tour_id','book_cus_id','book_phone','book_email','book_info','book_member','book_address','book_total_price','book_time'];
}
