<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class packageController extends Controller
{
    public function add_package(){
        $packages = DB::table('now_packages')
        ->where('is_delete',1)
        ->get();
        return view('packages/add',compact('packages'));
    }
    public function add_package_process(Request $request){
        // return $request->all();
        $name = $request->name;
        $desc = $request->description;


        DB::table('now_packages')->insert([
        'packagename'=>$name,
        'description'=>$desc,



    ]);
         return redirect()->back();
    }
    public function view_package(){
		  $packeges = DB::table('now_packages')->get();
		  dd($packeges);
          return view('packages.view',compact('packeges'));
    }

    public function edit_packages($id){

        $edit = DB::table('now_packages')
         ->where('id',$id)
         ->first();

         $packages = DB::table('now_packages')->get();
         return view('packages/add',compact('packages','edit'));



     }


 public function save_edit(Request $request){

     $id = $request->id;
     $name = $request->name;
     $desc = $request->description;

     $edit = DB::table('now_packages')
     ->where('id',$id)
     ->update([

         'packagename' => $name,
         'description' => $desc

     ]);

    return redirect('add-package');
 }


 public function index(Request $request){

    $query = DB::table('now_packages')
    ->where('is_delete',1);

    if ($request->has('name_package')) {
        $query->where('packagename', 'like', '%' . $request->input('name_package') . '%');
    }

    if ($request->has('description_package')) {
        $query->where('description', 'like', '%' . $request->input('description_package') . '%');
    }
    // Execute the query and get the results
    $packages = $query->get();


    return view('packages/add',compact('packages'));
}




 public function delete_packages($id){

     $delete = DB::table('now_packages')
     ->where('id',$id)
     ->update([

         'is_delete' => 0,
     ]);

    return redirect('add-package');
 }







}
