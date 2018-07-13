<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;

class patient extends Model
{
    //

    protected $table = 'patient';
    protected $primaryKey = 'puid';
    public $timestamps = false;
    public $incrementing = false;

    public function btmd(){

        return $this->belongsToMany('doctor', 'dmembers');

    }

}
