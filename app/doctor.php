<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    //
    protected $table = 'doctor';
    protected $primaryKey = 'duid';
    public $timestamps = false;
    public $incrementing = false;
}
