<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class xaphuongthitran extends Model
{
  protected $table ='devvn_xaphuongthitran';
  protected $fillable =['xaid','name','type', 'maph'];

}
