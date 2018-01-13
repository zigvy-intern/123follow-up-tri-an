<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourDetail extends Model
{
    protected $table ='tours_detail';
    protected $fillable = ['tour_id','tour_description_detail','tour_image_detail'];

    public function getTourViewData()
    {
        return [
        'id' => $this->id,
        'tour_id' => $this->tour_id,
        'tour_description_detail' => $this->tour_description_detail,
        'tour_image_detail' => $this->tour_image_detail
      ];
    }
}
