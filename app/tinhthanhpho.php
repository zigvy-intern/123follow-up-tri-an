<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinhthanhpho extends Model
{
  protected $table ='devvn_tinhthanhpho';
  protected $fillable =['matp','name','type'];
}
