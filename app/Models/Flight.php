<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flights';

    protected $fillable = ['name','f_code','notes','age'];//,'created_at'];

    //
}
