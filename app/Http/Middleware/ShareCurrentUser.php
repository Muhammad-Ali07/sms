<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use View;
use DB;

class ShareCurrentUser{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
  public function handle($request, Closure $next)
  {
     
    if(auth()->user()){
      $data['userInfo'] = auth()->user();
			$id = $data['userInfo']->id;
			$data['userDetails'] = DB::table('users')->where('id',$id)->get();
	   ;
      if(isset($data['userDetails']) && sizeof($data['userDetails']) > 0){
       
        $name = $data['userDetails'][0]->name;
       // $admin = $data['userDetails'][0]->admin;
       // $panelw = $data['userDetails'][0]->wazir;
       // $paneln = $data['userDetails'][0]->nsk;
      }else{
        $name = 0;
       // $admin = 0;
       // $panelw = 0;
        //$paneln = 0;
      }
      
    
	  // view::share('admin',$admin);
      view::share('name',$name);
     // view::share('nsk',$paneln);
     // view::share('wazir',$panelw); 
      
     // dd($name);
/*****Navigation Authentication************************************************/
      $data['userAuths'] = DB::table('user_meta')->where('fk_user_id',$id)->get();
  
      if(isset($data['userAuths']) && sizeof($data['userAuths']) > 0){
     
        view::share('setup',$data['userAuths'][0]->setup);
        view::share('daily_labour_payment',$data['userAuths'][0]->daily_labour_payment);
        view::share('builty',$data['userAuths'][0]->builty);
        view::share('challan',$data['userAuths'][0]->challan);
        view::share('bills1',$data['userAuths'][0]->bills);
        
        
        view::share('commsion_book',$data['userAuths'][0]->commsion_book);
        view::share('daily_expenses',$data['userAuths'][0]->daily_expenses);
        view::share('cash_statement_head_office',$data['userAuths'][0]->cash_statement_head_office);
        view::share('tracking',$data['userAuths'][0]->tracking);
        view::share('own_vehicle_trip',$data['userAuths'][0]->own_vehicle_trip);
        view::share('salary',$data['userAuths'][0]->salary);
        view::share('ledger',$data['userAuths'][0]->ledger);
        view::share('hr',$data['userAuths'][0]->hr);
        view::share('accounts',$data['userAuths'][0]->accounts);
        view::share('received_paid',$data['userAuths'][0]->received_paid);
        
/*****Further Authentication***************************************************/
        view::share('insertion',$data['userAuths'][0]->insertion);
        view::share('edition',$data['userAuths'][0]->edition);
        view::share('deletion',$data['userAuths'][0]->deletion);
      }else{
        view::share('setup',0);
        view::share('daily_labour_payment',0);
        view::share('builty',0);
        view::share('challan',0);
        view::share('bills',0);
        view::share('salary',0);
        view::share('ledger',0);
        
       
  /*****Further Authentication***************************************************/
        view::share('insertion',0);
        view::share('edition',0);
        view::share('deletion',0);
      }
      return $next($request);
    }else{
      return $next($request);
    }
  }
}
