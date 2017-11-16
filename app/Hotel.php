<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table ='bookhotel';
    protected $fillable =['place','hotel_name','hotel_image'];
}
