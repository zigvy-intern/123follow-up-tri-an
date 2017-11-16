<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictrict extends Model
{
    protected $table ='devvn_quanhuyen';
    protected $fillable =['maqh','name','type', 'matp'];
}
