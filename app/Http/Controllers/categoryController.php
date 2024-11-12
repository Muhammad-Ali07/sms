<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class categoryController extends Controller
{
    public function add_category(){
$select =DB::table('autoshop')->where('is_delete',1)->get();

return view('category.add-category ',compact('select'));


    }



public function view_category(){

$select =DB::table('autoshop')->where('is_delete',1)->get();
    
$category = DB::table('category')
->select('ShopName','Des','category.id')
->join('autoshop','category.Name','autoshop.id')
    ->where('category.is_delete',1)
    ->get();

   // dd($select);
    return view('category.add-category',compact('category','select'));

}


    public function save_category(Request $request){
            $shop = $request->shop;
            $Items =$request->Items;
            
            for($i = 0; $i < count($Items); $i++){   
                $insert =  DB::table('category')->insert([   
                'Name' =>  $shop,
                'Des' => $Items[$i],
               ]);     
            }

            return redirect('view-category');
            
    }




    public function edit_category($id){


//dd($request->all());
        $query = DB::table('category')
        ->where('id',$id)
        ->first();
$select =DB::table('autoshop')->where('is_delete',1)->get();
        $category = DB::table('category')->get();



        return view('category.add-category',compact('query','category','select'));

    }

    public function edit_category_process(Request $request){


dd($request->all());
        $id   = $request->input('id');
        $name = $request->input('shop');
        $desc = $request->input('Items[]');



           $insert =  DB::table('category')
           ->where('id',$id)
           ->update([   

            'Name' =>  $shop,
                'Des' => $Items[$i],

           ]);    
           
           

        return redirect('view-category');
        
}


public function delete_category($id){


    $delete =  DB::table('category')
           ->where('id',$id)
           ->update([   

            'is_delete' =>  0
          
           ]);     


           return redirect('view-category');
        

}





}


