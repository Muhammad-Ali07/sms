<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank_account;

class AjaxController extends Controller
{
    public function bankAccountAmount($id)
    {
    	$balance = 0;
    	if($id != 'undefined'){
    		$balance = Bank_account::where('id',\Crypt::decrypt($id))->first()->amount;
    	}
    	return response()->json($balance);
    }
}
