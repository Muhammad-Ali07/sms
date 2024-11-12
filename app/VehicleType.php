<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    //


    protected $table = 'vehicle_type';
    //  protected $connection = 'default';

    protected $fillable=['name'];

    public $timestamps = false;

}
