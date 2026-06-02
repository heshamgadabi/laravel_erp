<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';

    protected $fillable = ['total','name'];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    //
}
