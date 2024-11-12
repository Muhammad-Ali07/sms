<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    //


    protected $table = 'other';
    //  protected $connection = 'default';

    protected $fillable=['doc_name','doc_file','broker_id'];

    public $timestamps = false;

}
