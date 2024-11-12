<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class NowPhone extends Model
{
    //


    protected $table = 'now_broker_phone';
    //  protected $connection = 'default';


    public $timestamps = false;


    /**
     * Get all of the comments for the Broker
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function other()
    {
        return $this->hasMany(Other::class, 'broker_id', 'broker_id');
    }

}
