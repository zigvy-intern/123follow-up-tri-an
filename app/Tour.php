<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table ='tours';
    protected $fillable =['tour_name','tour_form_id','tour_to_id', 'tour_start_time','tour_end_time','tour_member','tour_price', 'tour_image'];
}
