<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutoshopController extends Controller
{
    public function add_autoshop(){
        $shop = DB::table('autoshop')
        ->where('autoshop.is_delete',1)
        ->get();
return view ('Auto_Shop.add-auto',compact('shop'));
    }

    public function view_autoshop(){
        $shop = DB::table('autoshop')->where('is_delete',1)->get();
        return view('Auto_Shop.add-auto',compact('shop'));
    }

    public function save_autoshop(Request $request){

        $name = $request->input('name');
        $Contact = $request->input('Contact');
        $Address = $request->input('Address');

        $insert = DB::table('autoshop')->insert([

            'ShopName' => $name,
            'Contact' => $Contact,
            'Address' => $Address,
        ]);


        return redirect('view-autoshop');

    }



    public function save_edit_autoshop(Request $request){

        $id =$request->input('id');
        $name = $request->input('name');
      //  $category = $request->input('category');
       // $vendorName = $request->input('vendorName');
        $Contact = $request->input('Contact');
        $Address = $request->input('Address');

        $insert = DB::table('autoshop')
        ->where('id',$id)
        ->update([

            'ShopName' => $name,
         //   'Category' => $category,
           // 'VendorName' => $vendorName,
            'Contact' => $Contact,
            'Address' => $Address,
        ]);


        return redirect('view-autoshop');

    }


    public function delete_autoshop($id){


        $insert = DB::table('autoshop')
        ->where('id',$id)
        ->update([

            'is_delete' => 0, 
        ]);
        return redirect('view-autoshop');

    }




    

    public function edit_autoshop($id){

     //   $selectcategory = DB::table('category')->get();

        $query = DB::table('autoshop')
        ->where('id',$id)
        ->first();
     // dd($query);
        // $shop = DB::table('autoshop')
        // ->join('category','autoshop.Category','category.id')
        // ->where('autoshop.is_delete',1)
        // ->select('autoshop.id','autoshop.VendorName','autoshop.Contact','autoshop.Address','category.Name','autoshop.ShopName')
        // ->get();
    
        return view ('Auto_Shop.add-auto',compact('query'));
    
    }





}
