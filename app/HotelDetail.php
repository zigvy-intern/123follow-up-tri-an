<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelDetail extends Model
{
    protected $table ='hotels_detail';
    protected $fillable =['id_hotel','hotel_slide','hotel_description'];

    public function getHotelViewData()
    {
        return [
        'id' => $this->id,
        'id_hotel' => $this->id_hotel,
        'hotel_slide' => $this->hotel_slide,
        'hotel_description' => $this->hotel_description
      ];
    }
}
