<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeroom extends Model
{
  protected $table ='type_room';
  protected $fillable =['id_detail','type',	'price'];
}
