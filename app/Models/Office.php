<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    protected $table = 'office';

    protected $fillable = ['title','description'];

    use SoftDeletes;

    const UPDATED_AT = null;
    const CREATED_AT = null;

    //
}
