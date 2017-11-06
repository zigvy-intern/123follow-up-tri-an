<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table ='tours';
    protected $fillable =['tour_name','tour_form','tour_to', 'tour_time','tour_member','tour_price', 'tour_image','tour_description'];
}
