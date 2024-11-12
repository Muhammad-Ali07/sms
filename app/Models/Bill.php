<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Hash;

class Bill extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    // Don't forget to fill this array
    protected $guarded = [];
    
    protected $table = 'bill';

}
?>