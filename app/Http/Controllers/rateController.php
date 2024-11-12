<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class rateController extends Controller
{
    
      public function normal_ratelist_edit(Request $request){
          
    //	dd($request->all());
    	$amount_fcl = NULL;
    	$other_charges_fcl = NULL;
    	    $packages   = [];
    	    $form       = [];
    	    $to         = [];
    	    $rate       = [];
    	    $rates      = [];
    	    $datas      = [];
    	    $lcl = null;
    		$fcl = null;
    		
			
			if(!empty($request->updated_ratelist_id)){
			    $delete = DB::table('now_rateslist')->where('id',$request->updated_ratelist_id)->delete();
			    if($delete){
			        DB::table('customer_ratelist')->where('ratelist_id',$request->updated_ratelist_id)->delete();
			    }
			}
			
			
			
			if(!empty($request->builty_type[0]) && $request->builty_type[0] == 'lcl'){
				$lcl = $request->builty_type[0];
			} 
			if(!empty($request->builty_type[1]) && $request->builty_type[1] == 'fcl'){
				$fcl = $request->builty_type[1];
			}
				$customer_profile = 'normal';
				$customerid = 0;
		
			
			if(!empty($request->lcl_other_charges) && !empty($request->lcl_amount) ){
			    $other_charges 		= implode(',',$request->lcl_other_charges);
    			$amount 			= implode(',',$request->lcl_amount);
			}
			
			if(!empty($request->fcl_other_charges) && !empty($request->fcl_amount) ){
			    $other_charges_fcl 		= implode(',',$request->fcl_other_charges);
    			$amount_fcl 			= implode(',',$request->fcl_amount);
			}
	     
	        
			$last_id = DB::table('now_rateslist')->insertGetId([
							'customerid'            => $customerid,
							'customer_profile'      => $customer_profile,
							'other_amount'          => $amount,
							'other_charges'         => $other_charges,
							'fcl_other_amount'      => $amount_fcl,
							'fcl_other_charges'     => $other_charges_fcl,
    					]);
    	    
    	   if(!empty($last_id)){
    	       
    	       if(!empty($request->lcl_stations)){
    	           if(!empty($lcl)){
    	           foreach($request->lcl_stations as $key => $stations){
            		    $packages   = 'lcl_package_'.$stations;
            		    $form       = 'from_'.$stations;
                        $to         = 'to_'.$stations;
                        $rate       = 'rate_'.$stations;
                        
                        $datas[$stations]['packages']    = $request->$packages;
                        $datas[$stations]['from']        = $request->$form;
                        $datas[$stations]['to']          = $request->$to;
                        $datas[$stations]['rate']        = $request->$rate;
            		}
        	
        		    foreach($datas as $station_id => $data){
        	            foreach($data['from'] as $key => $from){
        	                
        	                
         					$result = DB::table('customer_ratelist')->insert([
    		 						'customer_id'       =>$customerid,
    		 						 'package_id'       =>$data['packages'][$key],
    		 						'customer_profile'  =>$customer_profile,
    		 						'ratelist_id'       =>$last_id,
    		 						'StationIdFrom'     => $from,
    		 						'StationIdTo'       => $data['to'][$key],
    		 					    'rate'              => $data['rate'][$key],
    		 						'builty_type'       => $lcl,
    		 						'created_at'        =>date('Y-m-d')]);  
        	            }  
        		     }
    	           }
                }
                if($request->fcl_stations){
                     if(!empty($fcl)){
        	        foreach($request->fcl_stations as $key => $fcl_stations){
            		    $packages_1   = 'fcl_package'.$fcl_stations;
            		   
            		    $form_1       = 'fcl_from_'.$fcl_stations;
                        $to_1         = 'fcl_to_'.$fcl_stations;
                        $rate_1       = 'fcl_rate_'.$fcl_stations;
                        
                        $datas_1[$fcl_stations]['packages']    = $request->$packages_1;
                        $datas_1[$fcl_stations]['from']        = $request->$form_1;
                        $datas_1[$fcl_stations]['to']          = $request->$to_1;
                        $datas_1[$fcl_stations]['rate']        = $request->$rate_1;
                        
            		}
            		
            	   
        		    foreach($datas_1 as $station_id_1 => $data_1){
        		    
        	            foreach($data_1['from'] as $key_1 => $from_1){
        	               
        	                $result = DB::table('customer_ratelist')->insert([
    	 						'customer_id'       =>$customerid,
    	 					    'package_id'        =>$data_1['packages'][$key_1],
    	 						'customer_profile'  =>$customer_profile,
    	 						'ratelist_id'       =>$last_id,
    	 						'StationIdFrom'     => $from_1,
    	 						'StationIdTo'       => $data_1['to'][$key_1],
    	 					    'rate'              => $data_1['rate'][$key_1],
    	 						'builty_type'       => $fcl,
    	 						'created_at'        =>date('Y-m-d')]);
        	            }  
        		    }
                  }
    	        }
	    }
        return redirect('view-ratelist');
		
		/*if(!empty($last_id)){
			if(is_array($_REQUEST['lcl_items'])){

						foreach($request->lcl_packages as $package){

							foreach($_REQUEST['lcl_items'] as $val){ 
								$aItems = explode("|",$val);
								if($aItems[0] !== 'undefined'){
								 $result = DB::table('customer_ratelist')->insert([
				 						'customer_id'=>$customerid,
				 						'package_id'=>$package,
				 						'customer_profile'=>$customer_profile,
				 						'ratelist_id'=>$last_id,
				 						'StationIdFrom'=>$aItems[0],
				 						'StationIdTo'=>$aItems[1],
				 						'rate'=>$aItems[2],
				 						'builty_type'=> $lcl,
				 						'created_at'=>date('Y-m-d')]);
							 		}       
								}

							}
						}

			
        		 if(is_array($_REQUEST['fcl_items'])){

					foreach($request->fcl_packages as $package){

						foreach($_REQUEST['fcl_items'] as $val){ 
									$aItems = explode("|",$val);
									if($aItems[0] !== 'undefined'){
									 $result = DB::table('customer_ratelist')->insert([
					 						'customer_id'=>$customerid,
					 						'package_id'=>$package,
					 						'customer_profile'=>$customer_profile,
					 						'ratelist_id'=>$last_id,
					 						'StationIdFrom'=>$aItems[0],
					 						'StationIdTo'=>$aItems[1],
					 						'rate'=>$aItems[2],
					 						'builty_type'=> $fcl,
					 						'created_at'=>date('Y-m-d')]);
								 	}       
								}
        					}
						}		
		}*/
		
		/*DB::table('customer')->where('id',$customerid)->update(['assigned'=>0]);
		
        return true;*/

    
    
    
	/*//dd($request->all());		
		DB::table('customer_ratelist')->where('customer_id',0)->delete();
		DB::table('now_rateslist')->where('customerid',0)->delete();
	
		if(!empty($request->lcl_other_charges) && !empty($request->lcl_amount) ){
			$other_charges 		= implode(',',$request->lcl_other_charges);
			$amount 			= implode(',',$request->lcl_amount);
		}			
		if(!empty($request->fcl_other_charges) && !empty($request->fcl_amount) ){
			$other_charges_fcl 		= implode(',',$request->fcl_other_charges);
			$amount_fcl 			= implode(',',$request->fcl_amount);
		}

		$last_id = DB::table('now_rateslist')->insertGetId([
			'customerid'            => 0,
			'customer_profile'      => 'normal',
			'detentional_amount'    => 0,
			'payment'               => 0,
			'other_amount'          => $amount,
			'other_charges'         => $other_charges,
			'fcl_other_amount'      => $amount_fcl,
			'fcl_other_charges'     => $other_charges_fcl,
		]);



		for($i = 0; $i < count($request->lcl_package); $i++){
		DB::table('customer_ratelist')->insert([

			'ratelist_id'  			=> $last_id,
			'customer_id' 			=> 0,
			'package_id' 			=> $request->lcl_package[$i],
			'customer_profile'  	=>'normal',
			'StationIdFrom' 		=> $request->formhidden,
			'StationIdTo' 			=> $request->tohidden[$i],
			'rate' 					=> $request->ratelcl[$i],
			'builty_type' 			=> 'lcl',
			'created_at'			=>date('Y-m-d'),
		]);


		}
		if(!empty($fcl_package)){
		for($j = 0; $j < count($request->fcl_package); $j++){
			DB::table('customer_ratelist')->insert([

				'ratelist_id'  			=> $last_id,
				'customer_id' 			=> 0,
				'package_id' 			=> $request->fcl_package4[$j],
				'customer_profile'  	=>'normal',
				'StationIdFrom' 		=> $request->formhidden,
				'StationIdTo' 			=> $request->fcl_to_4[$j],
				'rate' 					=> $request->fcl_rate_4[$j],
				'builty_type' 			=> 'fcl',
				'created_at'			=>date('Y-m-d'),
			]);

			}
		}
					return redirect('view-ratelist');	*/
	} 



    public function Edit_customer_profile_process($id){
        $lcl_items = [];
        $fcl_items = [];
        $i=0;
        $j=0;
	
		$stations = DB::table('now_station')->get();
     
        $ratelists_lcl = DB::select("SELECT R.StationIdTo AS 'station_id_to',R.StationIdFrom AS 'station_id_from', S.Name AS 'from',S2.Name AS 'to',P.packagename AS 'package',R.Rate AS 'rate' ,R.Rate AS 'rate',R.builty_type AS 'type' 
		    FROM customer_ratelist R
			INNER JOIN now_station AS S ON R.StationIdFrom=S.Id
			INNER JOIN now_station AS S2 ON R.StationIdTo=S2.Id 
			INNER JOIN now_packages AS P ON R.package_id=P.Id 
			WHERE R.builty_type = 'lcl' AND R.ratelist_id = '".$id."'");
									
	  
	    $ratelists_fcl = DB::select("SELECT R.StationIdTo AS 'station_id_to',R.StationIdFrom AS 'station_id_from', S.Name AS 'from',S2.Name AS 'to',P.packagename AS 'package',R.Rate AS 'rate' ,R.Rate AS 'rate',R.builty_type AS 'type' 
    	    FROM customer_ratelist R
    		INNER JOIN now_station AS S ON R.StationIdFrom=S.Id
    		INNER JOIN now_station AS S2 ON R.StationIdTo=S2.Id 
    		INNER JOIN now_packages AS P ON R.package_id=P.Id 
    		WHERE R.builty_type = 'fcl' AND R.ratelist_id = '".$id."'");
									
    
     
    	foreach($ratelists_lcl as $row){
        		$lcl_items[$row->to][$i]['from'] = 'Karachi';
        	    $lcl_items[$row->to][$i]['from_id'] = '10';
        		$lcl_items[$row->to][$i]['to'] = $row->to;
        		$lcl_items[$row->to][$i]['to_id'] = $row->station_id_to;
        		$lcl_items[$row->to][$i]['rate'] = $row->rate;
        		$lcl_items[$row->to][$i]['package'] = $row->package;
        		$lcl_items[$row->to][$i]['type'] = $row->type;
        		$i++;
    	    }
    	
    	
     
    	foreach($ratelists_fcl as $row){
        		$fcl_items[$row->to][$j]['from']    = 'Karachi';
        	    $fcl_items[$row->to][$j]['from_id'] ='10';
        		$fcl_items[$row->to][$j]['to']      = $row->to;
        		$fcl_items[$row->to][$j]['to_id']   = $row->station_id_to;
        		$fcl_items[$row->to][$j]['rate']    = $row->rate;
        		$fcl_items[$row->to][$j]['package'] = $row->package;
        		$fcl_items[$row->to][$j]['type']    = $row->type;
        		$j++;
    	}
    	
        $package  = DB::table('now_packages')->where('is_delete',1)->get();
        $package1   = DB::table('now_packages')->where('lcl',1)->get();

	
		$rowratelist = DB::table('now_rateslist')
		->join('customer','now_rateslist.customerid','customer.id')
		->where('now_rateslist.id',$id)->first();
		
        	if(!empty($rowratelist)){
        	    $lcl_amount = explode(",",$rowratelist->other_amount);
        	    $lcl_amounthead = explode(",",$rowratelist->other_charges);
        	}
        	
        	if(!empty($rowratelist)){
        	    $fcl_amount = explode(",",$rowratelist->fcl_other_amount);
        	    $fcl_amounthead = explode(",",$rowratelist->fcl_other_charges);
        	}
        
        	    return view('ratelist.Edit-customer-profile',compact('stations','package','package1',
			'rowratelist','id','lcl_amounthead','lcl_amount','fcl_amounthead','fcl_amount','lcl_items','fcl_items'));
		}
		

    public function view_edit_ratelist($id){
        
         $lcl_items = [];
        $fcl_items = [];
          $lcl_amount = [];
        $lcl_amounthead = [];
        $fcl_amount = [];
        $fcl_amounthead = [];
        
        $i=0;
        $j=0;
        
        	$stations = DB::table('now_station')->get();
        	$ratelists_lcl = DB::select("SELECT R.StationIdTo AS 'station_id_to',R.StationIdFrom AS 'station_id_from', S.Name AS 'from',S2.Name AS 'to',P.packagename AS 'package',R.Rate AS 'rate' ,R.Rate AS 'rate',R.builty_type AS 'type' 
		    FROM customer_ratelist R
			INNER JOIN now_station AS S ON R.StationIdFrom=S.Id
			INNER JOIN now_station AS S2 ON R.StationIdTo=S2.Id 
			INNER JOIN now_packages AS P ON R.package_id=P.Id 
			WHERE R.builty_type = 'lcl' AND R.ratelist_id = '".$id."'");
									
	    
	    $ratelists_fcl = DB::select("SELECT R.StationIdTo AS 'station_id_to',R.StationIdFrom AS 'station_id_from', S.Name AS 'from',S2.Name AS 'to',P.packagename AS 'package',R.Rate AS 'rate' ,R.Rate AS 'rate',R.builty_type AS 'type' 
    	    FROM customer_ratelist R
    		INNER JOIN now_station AS S ON R.StationIdFrom=S.Id
    		INNER JOIN now_station AS S2 ON R.StationIdTo=S2.Id 
    		INNER JOIN now_packages AS P ON R.package_id=P.Id 
    		WHERE R.builty_type = 'fcl' AND R.ratelist_id = '".$id."'");
									
    	
    	foreach($ratelists_lcl as $row){
        		$lcl_items[$row->to][$i]['from'] = $row->from;
        	    $lcl_items[$row->to][$i]['from_id'] = $row->station_id_from;
        		$lcl_items[$row->to][$i]['to'] = $row->to;
        		$lcl_items[$row->to][$i]['to_id'] = $row->station_id_to;
        		$lcl_items[$row->to][$i]['rate'] = $row->rate;
        		$lcl_items[$row->to][$i]['package'] = $row->package;
        		$lcl_items[$row->to][$i]['type'] = $row->type;
        		$i++;
    	    }
    	
    	
     
    	foreach($ratelists_fcl as $row){
        		$fcl_items[$row->to][$j]['from']    = $row->from;
        	    $fcl_items[$row->to][$j]['from_id'] = $row->station_id_from;
        		$fcl_items[$row->to][$j]['to']      = $row->to;
        		$fcl_items[$row->to][$j]['to_id']   = $row->station_id_to;
        		$fcl_items[$row->to][$j]['rate']    = $row->rate;
        		$fcl_items[$row->to][$j]['package'] = $row->package;
        		$fcl_items[$row->to][$j]['type']    = $row->type;
        		$j++;
    	}
    	
        $package  = DB::table('now_packages')->where('is_delete',1)->get();
        $package1   = DB::table('now_packages')->where('lcl',1)->get();

		$rowratelist = DB::table('now_rateslist')
		//->join('customer','now_rateslist.customerid','customer.id')
		->where('now_rateslist.id',$id)->first();
		
        	if(!empty($rowratelist)){
        	    $lcl_amount = explode(",",$rowratelist->other_amount);
        	    $lcl_amounthead = explode(",",$rowratelist->other_charges);
        	}
        	
        	if(!empty($rowratelist)){
        	    $fcl_amount = explode(",",$rowratelist->fcl_other_amount);
        	    $fcl_amounthead = explode(",",$rowratelist->fcl_other_charges);
        	}
        	
        return view('ratelist.view-edit-normal',compact('stations','package','package1',
			'rowratelist','id','lcl_amounthead','lcl_amount','fcl_amounthead','fcl_amount','lcl_items','fcl_items'));
        $lcl_items = [];
        $fcl_items = [];
        $i=0;
        $j=0;
		
	
       /* $lcl_items = [];
        $fcl_items = [];
        $i=0;
        $j=0;
        $customers  = DB::table('customer')->where('is_delete',1)->where('assigned',1)->get();
        $packeges  = DB::table('now_packages')->where('is_delete',1)->get();
        $fcl_packeges   = DB::table('now_packages')->where('lcl',1)->get();
        $stations   = DB::table('now_station')->get();
        $rowratelist = DB::table('now_rateslist')
        ->where('customerid',0)
        ->where('now_rateslist.id',$id)->first();
        $rates = DB::table('customer_ratelist')->where('ratelist_id',$id)->where('builty_type','lcl')->get();
        $ratesfcl = DB::table('customer_ratelist')->where('ratelist_id',$id)->where('builty_type','fcl')->get();*/
       // return view('ratelist.view-edit-normal',compact('rates','ratesfcl','stations','id','rowratelist','customers','packeges','fcl_packeges'));
        
    }	
        	


    public function save_edit_ratelist(Request $request){

$rate = $request->rate;
$id = $request->id;
$packages =$request->package;
$headofamount =$request->other_charges;
for($i = 0; $i < count($rate); $i++ ){
$cehck =	DB::table('customer_ratelist')
	->where('id',$id[$i])
	->update([
		'rate' => $rate[$i],
	]);	
$DBtabel = DB::table('customer_ratelist')
->where('id',$id[$i])
->update([
	'package_id'=>$packages
]);
}
for($j= 0; $j < count($headofamount); $j++ ){
$impotecharegs	= implode(',',$request->other_charges);
$impoteamoount	= implode(',',$request->amount);
}

$Db = DB::table('now_rateslist')->where('customer_profile','normal')
->update([
	'other_amount' => $impoteamoount,
	'other_charges' => $impotecharegs
]);


	return redirect('view-ratelist');
}
	
	
	public function add_ratelist(){

       	$customers  = DB::table('customer')->where('is_delete',1)->where('assigned',1)->get();
        $packeges  = DB::table('now_packages')->where('is_delete',1)->get();
        $fcl_packeges   = DB::table('now_packages')->where('lcl',1)->get();
        $stations   = DB::table('now_station')->get();
		
        return view('ratelist.add',compact('customers','packeges','stations','fcl_packeges'));
    }
    public function add_ratelist_process(Request $request){
    	// dd($request->all());
    	$amount_fcl = NULL;
    	$other_charges_fcl = NULL;
    	    $packages   = [];
    	    $form       = [];
    	    $to         = [];
    	    $rate       = [];
    	    $rates      = [];
    	    $datas      = [];
    	    $lcl = null;
    		$fcl = null;
    		
			
			if(!empty($request->updated_ratelist_id)){
			    $delete = DB::table('now_rateslist')->where('id',$request->updated_ratelist_id)->delete();
			    if($delete){
			        DB::table('customer_ratelist')->where('ratelist_id',$request->updated_ratelist_id)->delete();
			        DB::table('customerlabels')->where('CustomerID',$request->customer_id)->delete();
			    }
			}
			
			
			
			if(!empty($request->builty_type[0]) && $request->builty_type[0] == 'lcl'){
				$lcl = $request->builty_type[0];
			} 
			if(!empty($request->builty_type[1]) && $request->builty_type[1] == 'fcl'){
				$fcl = $request->builty_type[1];
			}
			
			$customerid = $request->customer_id;
			$customerForType = DB::table('customer')->where('id',$customerid)->first();
		   
			if($customerForType->builtytype == 'To Pay'){
				$customer_profile = 'normal';
			//	$customerid = 0;
			}else{
				$customer_profile = 'Billed';
			}
	
    	    $current_rate 		= $request->payment;
			$detentional_amount = $request->detentional_amount;
			
			if(!empty($request->lcl_other_charges) && !empty($request->lcl_amount) ){
			    $other_charges 		= implode(',',$request->lcl_other_charges);
    			$amount 			= implode(',',$request->lcl_amount);
			}
			
			if(!empty($request->fcl_other_charges) && !empty($request->fcl_amount) ){
			    $other_charges_fcl 		= implode(',',$request->fcl_other_charges);
    			$amount_fcl 			= implode(',',$request->fcl_amount);
			}
	     
			$last_id = DB::table('now_rateslist')->insertGetId([
							'customerid'            => $customerid,
							'customer_profile'      => $customer_profile,
							'detentional_amount'    => $detentional_amount,
							'payment'               => $current_rate,
							'other_amount'          => $amount,
							'other_charges'         => $other_charges,
							'fcl_other_amount'      => $amount_fcl,
							'fcl_other_charges'     => $other_charges_fcl,
    					]);
    	 
    	   if(!empty($last_id)){
    	       
    	       if(!empty($request->lcl_stations)){
    	           foreach($request->lcl_stations as $key => $stations){
            		    $packages   = 'lcl_package_'.$stations;
            		    $form       = 'from_'.$stations;
                        $to         = 'to_'.$stations;
                        $rate       = 'rate_'.$stations;
                       
                       
                        $datas[$stations]['packages']    = $request->$packages;
                        $datas[$stations]['from']        = $request->$form;
                        $datas[$stations]['to']          = $request->$to;
                        $datas[$stations]['rate']        = $request->$rate;
            		}
        		
        		    foreach($datas as $station_id => $data){
        	            foreach($data['from'] as $key => $from){
        	                
        	                 $packagess = DB::table('now_packages')->where('id',$data['packages'][$key])->first();
                                $lebels[$packagess->id] = $packagess;
                              
                        
         					$result = DB::table('customer_ratelist')->insert([
    		 						'customer_id'       =>$customerid,
    		 						 'package_id'       =>$data['packages'][$key],
    		 						'customer_profile'  =>$customer_profile,
    		 						'ratelist_id'       =>$last_id,
    		 						'StationIdFrom'     => $from,
    		 						'StationIdTo'       => $data['to'][$key],
    		 					    'rate'              => $data['rate'][$key],
    		 						'builty_type'       => $lcl,
    		 						'created_at'        =>date('Y-m-d')]);  
        	            }  
        		    }
        		   
        		    if(!empty($lebels)){
        		        foreach($lebels as $lebel){
        		            DB::table('customerlabels')->insertOrIgnore([
                                    'PackageID' => $lebel->id,
                                    'Name' => $lebel->packagename,
                                    'CustomerID' => $customerid,
                                ]);
        		            }
        		                
        		        }
                    }
                if($request->fcl_stations){
                  
                  
        	        foreach($request->fcl_stations as $key => $fcl_stations){
            		    $packages_1   = 'fcl_package'.$fcl_stations;
            		    $form_1       = 'fcl_from_'.$fcl_stations;
                        $to_1         = 'fcl_to_'.$fcl_stations;
                        $rate_1       = 'fcl_rate_'.$fcl_stations;
                        
                        
                        
                        
                        
                        $datas_1[$fcl_stations]['packages']    = $request->$packages_1;
                        $datas_1[$fcl_stations]['from']        = $request->$form_1;
                        $datas_1[$fcl_stations]['to']          = $request->$to_1;
                        $datas_1[$fcl_stations]['rate']        = $request->$rate_1;
                        
            		}
            		
            	
        		    foreach($datas_1 as $station_id_1 => $data_1){
        		    
        	            foreach($data_1['from'] as $key_1 => $from_1){
        	               
        	               $packages1 = DB::table('now_packages')->where('id',$data_1['packages'][$key_1])->first();
                            
                                $lebels1[$packages1->id] = $packages1;
                       
        	                $result = DB::table('customer_ratelist')->insert([
    	 						'customer_id'       =>$customerid,
    	 					    'package_id'        =>$data_1['packages'][$key_1],
    	 						'customer_profile'  =>$customer_profile,
    	 						'ratelist_id'       =>$last_id,
    	 						'StationIdFrom'     => $from_1,
    	 						'StationIdTo'       => $data_1['to'][$key_1],
    	 					    'rate'              => $data_1['rate'][$key_1],
    	 						'builty_type'       => $fcl,
    	 						'created_at'        =>date('Y-m-d')]);
        	            }  
        		    }
        		    
        		    
        		    if(!empty($lebels1)){
        		        foreach($lebels1 as $lebel1){
        		            DB::table('customerlabels')->insertOrIgnore([
                                    'PackageID' => $lebel1->id,
                                    'Name' => $lebel1->packagename,
                                    'CustomerID' => $customerid,
                                ]);
        		            }
        		                
        		        }
        		    
        		    
    	        }
	    }
    	  
	       
            DB::table('customer')->where('id',$customerid)->update(['assigned'=>0]);
		
            return redirect('view-customer-ratelist');
    }
	
	public function add_simple_ratelist_process(Request $request){
	    
	        $packages   = [];
    	    $form       = [];
    	    $to         = [];
    	    $rate       = [];
    	    $rates      = [];
    	    $datas      = [];
    	    $lcl = null;
    		$fcl = null;
    		
			if(!empty($request->updated_ratelist_id)){
			    $delete = DB::table('now_rateslist')->where('id',$request->updated_ratelist_id)->where('customer_id',0)->delete();
			    if($delete){
			        DB::table('customer_ratelist')->where('ratelist_id',$request->updated_ratelist_id)->where('customerid',0)->delete();
			    }
			}

			if(!empty($request->builty_type[0]) && $request->builty_type[0] == 'lcl'){
				$lcl = $request->builty_type[0];
			} 
			if(!empty($request->builty_type[1]) && $request->builty_type[1] == 'fcl'){
				$fcl = $request->builty_type[1];
			}
			
			$customerid = 0;
		
			if($customerid == 'normal'){
				$customer_profile = 'normal';
				$customerid = 0;
			}else{
				$customer_profile = 'Billed';
			}
	        //dd($customer_profile);

			if(!empty($request->lcl_other_charges) && !empty($request->lcl_amount) ){
			    $other_charges 		= implode(',',$request->lcl_other_charges);
    			$amount 			= implode(',',$request->lcl_amount);
			}
			
			if(!empty($request->fcl_other_charges) && !empty($request->fcl_amount) ){
			    $other_charges_fcl 		= implode(',',$request->fcl_other_charges);
    			$amount_fcl 			= implode(',',$request->fcl_amount);
			}
	
			$last_id = DB::table('now_rateslist')->insertGetId([
							'customerid'            => $customerid,
							'customer_profile'      => $customer_profile,
							'detentional_amount'    => 0,
							'payment'               => 0,
							'other_amount'          => $amount,
							'other_charges'         => $other_charges,
							'fcl_other_amount'      => $amount_fcl,
							'fcl_other_charges'     => $other_charges_fcl,
    					]);
    	    
    	   if(!empty($last_id)){
    	       
    	       if(!empty($request->lcl_stations)){
    	           foreach($request->lcl_stations as $key => $stations){
            		    $packages   = 'lcl_package_'.$stations;
            		    $form       = 'from_'.$stations;
                        $to         = 'to_'.$stations;
                        $rate       = 'rate_'.$stations;
                        
                        $datas[$stations]['packages']    = $request->$packages;
                        $datas[$stations]['from']        = $request->$form;
                        $datas[$stations]['to']          = $request->$to;
                        $datas[$stations]['rate']        = $request->$rate;
            		}
        		
        		    foreach($datas as $station_id => $data){
        	            foreach($data['from'] as $key => $from){
        	                
         					$result = DB::table('customer_ratelist')->insert([
    		 						'customer_id'       =>$customerid,
    		 						 'package_id'       =>$data['packages'][$key],
    		 						'customer_profile'  =>$customer_profile,
    		 						'ratelist_id'       =>$last_id,
    		 						'StationIdFrom'     => $from,
    		 						'StationIdTo'       => $data['to'][$key],
    		 					    'rate'              => $data['rate'][$key],
    		 						'builty_type'       => $lcl,
    		 						'created_at'        =>date('Y-m-d')]);  
        	            }  
        		    }
    	        
                }
                if($request->fcl_stations){
                  
        	        foreach($request->fcl_stations as $key => $fcl_stations){
            		    $packages_1   = 'fcl_package'.$fcl_stations;
            		   
            		    $form_1       = 'fcl_from_'.$fcl_stations;
                        $to_1         = 'fcl_to_'.$fcl_stations;
                        $rate_1       = 'fcl_rate_'.$fcl_stations;
                        
                        $datas_1[$fcl_stations]['packages']    = $request->$packages_1;
                        $datas_1[$fcl_stations]['from']        = $request->$form_1;
                        $datas_1[$fcl_stations]['to']          = $request->$to_1;
                        $datas_1[$fcl_stations]['rate']        = $request->$rate_1;
                        
            		}
            		
            	
        		    foreach($datas_1 as $station_id_1 => $data_1){
        		    
        	            foreach($data_1['from'] as $key_1 => $from_1){
        	               
        	                $result = DB::table('customer_ratelist')->insert([
    	 						'customer_id'       =>$customerid,
    	 					    'package_id'        =>$data_1['packages'][$key_1],
    	 						'customer_profile'  =>$customer_profile,
    	 						'ratelist_id'       =>$last_id,
    	 						'StationIdFrom'     => $from_1,
    	 						'StationIdTo'       => $data_1['to'][$key_1],
    	 					    'rate'              => $data_1['rate'][$key_1],
    	 						'builty_type'       => $fcl,
    	 						'created_at'        =>date('Y-m-d')]);
        	            }  
        		    }
    	        }
	    }
    	  
	       
            // DB::table('customer')->where('id',$customerid)->update(['assigned'=>0]);
		
            return redirect('view-ratelist');
	}

     public function view_ratelist(){
		
		 $ratelists = DB::table('now_rateslist')
							//->join('customer','now_rateslist.customerid','customer.id')
							//->join('now_packages','now_rateslist.package','now_packages.id')
							->select('now_rateslist.*','now_rateslist.id as ratelist_id')
							->where('now_rateslist.customer_profile','normal')
							->get();
		
		return view('ratelist.view',compact('ratelists'));
    }
	
	public function view_customer_ratelist(){
	
		$ratelists = null;
		$ratelists12 = DB::table('now_rateslist')
                		->join('customer','now_rateslist.customerid','customer.id')
                		->where('selfcompany',session('company')[0]->id)
                	//	->where('now_rateslist.customer_profile','=','Billed')
                		->select('now_rateslist.*','now_rateslist.id as ratelist_id','customer.*')
                		->get();
	  
		foreach($ratelists12 as $ratelist){
		    $ratelists[$ratelist->customerid] = $ratelist;
		}
	
		return view('ratelist.view',compact('ratelists'));
    }
	
	
	public function view_ratelist_detail($id){
		$ratelists = DB::select("SELECT S.Name AS 'from',S2.Name AS 'to',P.packagename AS 'package',R.Rate AS 'rate' ,R.Rate AS 'rate',R.builty_type AS 'type'
									FROM customer_ratelist R
									INNER JOIN now_station AS S ON R.StationIdFrom=S.Id
									INNER JOIN now_station AS S2 ON R.StationIdTo=S2.Id 
									INNER JOIN now_packages AS P ON R.package_id=P.Id 
									WHERE R.ratelist_id = '".$id."'"); 
	
    	$data= [];
    	$i=0;
    	
    	foreach($ratelists as $row){
    		
    		//$data[$i]['from'] = $row->from;
    		$data[$i]['from'] = 'Karachi';
    		$data[$i]['to'] = $row->to;
    		$data[$i]['rate'] = $row->rate;
    		$data[$i]['package'] = $row->package;
    		$data[$i]['type'] = $row->type;
    		$i++;
    	}
	
	    $result = json_encode($data);
		return view('ratelist.detail',compact('result'));
							
	}

    public function add_station_prices(Request $request){
        dd($request->all());
    }


	public function Edit_customer_profile(){


	
	}



}
