<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table ='place_district';
    protected $fillable =['maqh','district_name','type', 'matp'];
}
