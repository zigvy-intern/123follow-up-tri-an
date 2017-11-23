<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTour extends Model
{
    protected $table ='booking_tour';
    protected $fillable =['book_tour_id','book_cus_id','book_email','book_phone','book_address','book_member','book_time','book_price','book_total_price','created_at', 'updated_at'];
}
