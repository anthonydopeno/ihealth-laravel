<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sort extends Model
{
    //
    protected $table = 'sort';
    protected $primaryKey = 'duid';
    public $timestamps = false;
    public $incrementing = false;

}
