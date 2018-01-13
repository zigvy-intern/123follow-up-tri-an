<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table ='place_ward';
    protected $fillable =['xaid','ward_name','type', 'maph'];
}
