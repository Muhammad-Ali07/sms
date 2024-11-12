<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SuggestController extends Controller
{

    public function Add_suggestion(){
        
        $row=DB::table('now_station')  
        ->get();
        $data=DB::table('now_packages')->get();
        $customdata=DB::table('customer')->get();
        return view('SuggestionList.add',compact('row','data','customdata'));
    }






  public function view_suggestion(){

    $row=DB::table('now_station')->get();

    $list=DB::table('suggest_list')->where('is_delete',1)->get();
    $listcustom=DB::table('suggest_list')->get();

      return view('SuggestionList.view',compact('list','listcustom','row'));
}
     
   

    public function add_suggestion_process(Request $request){
        //dd($request->all());


        $suggestname   = $request->suggestname;
        $suggestlabour   = $request->suggestlabour;
        $suggeststation    = $request->suggeststation;
        $suggestpackage   = $request->suggestpackage;
        $suggest_freight   = $request->suggest_freight;
        $suggestdate   = $request->suggestdate;
  
      //dd($request->all());
     
       
        $last_id = DB::table('suggest_list')->insertGetId([
           // 'stationType'      => $stationtype ,
            'suggest_name'      => $suggestname,
            'Labour_suggest'       => $suggestlabour,  
            'suggest_station'      => $suggeststation,
             'suggest_package'       =>$suggestpackage,
            'suggest_freight'      => $suggest_freight, 
            'suggest_date'      => $suggestdate, 
        ]);
         
        
    return redirect('view-suggestion');
    
        }



        


        public function get_suggest_data(Request $request){
           

            $getdata=DB::table('suggest_list')
            ->where('id',$request->suggestname)
            ->where('suggest_station',$request->suggeststation)
            ->get();
           
            $row=DB::table('now_station')->get();

            $list=DB::table('suggest_list')->where('is_delete',1)->get();
            $listcustom=DB::table('suggest_list')->get();
        
              return view('SuggestionList.view',compact('list','listcustom','row','getdata'));
        
        }

   

    
public function delete_suggest($id){
  
    $update1 = DB::table('suggest_list')
    ->where('id', $id)
    ->update([
        'is_delete' => 0,
      
    ]);
    return redirect('view-suggestion');

}

public function edit_suggest($id){

    $query =  DB::table('suggest_list')
    ->where('id',$id)
    ->first();

    $listcustom=DB::table('suggest_list')
    ->get();

    $row=DB::table('now_station')
	  ->get();
      $list=DB::table('suggest_list')
      ->where('is_delete',1)
      ->get();

      $data=DB::table('now_packages')->get();

return view('SuggestionList.add',compact('listcustom','query','row','list','data'));
}

public function edit_suggest_porcess(Request $request){


    $id        = $request->id;
    $suggestname   = $request->suggestname;
    $suggestlabour   = $request->suggestlabour;
    $suggeststation    = $request->suggeststation;
    $suggestpackage   = $request->suggestpackage;
    $suggest_freight   = $request->suggest_freight;
    $suggestdate   = $request->suggestdate;

    $result = DB::table('suggest_list')
    ->where('id',$id)
    ->update([

        'suggest_name'      => $suggestname,
            'Labour_suggest'       => $suggestlabour,  
            'suggest_station'      => $suggeststation,
             'suggest_package'       =>$suggestpackage,
            'suggest_freight'      => $suggest_freight, 
            'suggest_date'      => $suggestdate, 
        ]);
            return redirect('view-suggestion');
}

}
    
