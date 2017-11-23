<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table ='customers';
    protected $fillable =['cus_name','cus_email','cus_password','cus_birthday','cus_address', 'cus_phone'];
}
