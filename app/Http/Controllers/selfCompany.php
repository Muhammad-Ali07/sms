<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class selfCompany extends Controller
{
    public function add_self_company(Request $req){

        $name = $req->input('name');
        $phones = $req->input('phones');
        $address = $req->input('address');
        $ntn = $req->input('ntn');

        if(!empty($req->logo)){
        $imageName = $req->logo->getClientOriginalName();

        $location= $req->logo->move(public_path('selfcompany_image'), $imageName);
    }
    else{
        $imageName = 0;
        $location = 0;
    }


        DB::table('selfcompany')->insert([
            'name'=>$name,
            'phone'=>$phones,
            'address'=>$address,
            'ntn'=>$ntn,
            'logo'=>$imageName  ,
            'doc'=>$location
        ]);

        return redirect('self-company');


    }



    public function self_company(){

    $selfcompany = DB::table('selfcompany')
    ->where('is_delete',1)
    ->get();


    return view('selfcompany.add',compact('selfcompany'));

}


public function edit_selfcompany($id){

    $selfcompany = DB::table('selfcompany')
    ->where('is_delete',1)
    ->get();


    $edit = DB::table('selfcompany')
    ->where('id',$id)
    ->where('is_delete',1)
    ->first();

    return view('selfcompany.add',compact('selfcompany','edit'));


}


public function save_edit_selfcompany(Request $req){

    $name = $req->name;
$id = $req->id;
$phones = $req->phones;
$logo = $req->logo;
$ntn = $req->ntn;
$address = $req->address;

    if(!empty($logo)){

        $file = $req->logo->getClientOriginalName();
        $location= $req->logo->move(public_path('selfcompany_image'), $logo);
    }

    else{

    $finder = DB::table('selfcompany')
    ->where('id',$id)
    ->first();

        $file =  $finder->logo;
    }


$selfcompany = DB::table('selfcompany')
    ->where('id',$id)
    ->update([

        'name' => $name,
        'phone' => $phones,
        'ntn' => $ntn,
        'address' => $address,
        'logo' => $file
    ]);


    return redirect('self-company');




}



public function delete_selfemployee($id){

    $selfcompany = DB::table('selfcompany')
        ->where('id',$id)
        ->update([

            'is_delete' => 0

        ]);


        return redirect('self-company');


}

public function selfcompany_data(Request $req){

         $selfcompany = DB::table('selfcompany')->where('id',$req->id)->where('is_delete',1)->first();
        return response()->json($selfcompany);

    }






}
