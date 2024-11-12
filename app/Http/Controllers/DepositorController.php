<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DepositorController extends Controller
{
    
    public function create(){
        // dd('in controller');
        return view('depositor.add', compact('data'));
    }
    
    public function save(Request $request){
        
        $name = $request->name;
        $city = $request->city;
        $phone_no = $request->phone;
        
         $get_id1 = DB::table('depositor')->insert([
            'name' => isset($name) ? $name : 'not added',
            'city' => isset($city) ? $city : 'not added',
            'phone_no' => $phone_no,
            ]);
        
        return redirect('add-depositor');
    }
    
    public function index(){
        
        $data = [];
        
        $depositors = DB::table('depositor')->get();
        $data['depositors'] = $depositors;
        
        return view('depositor.view',compact('data'));
    }
    
    public function edit($id){
        // dd($id);
        $data = [];
        $depositor = DB::table('depositor')->where('id', '=' , $id )->first();
        $data['depositor'] = $depositor;
        
        return view('depositor.edit',compact('data'));
    }
 
	public function update(Request $request)
    {
        // Retrieve request data
        // dd($request->all());
        $id = $request->id;
        $name = $request->name;
        $city = $request->city;
        $phone_no = $request->phone;
        

        $get_id1 = DB::table('depositor')->where('id',$id)->update([
            'name' => $name,
            'city' =>  $city,
            'phone_no' => isset($phone_no) ? $phone_no : '0',
        ]);
        return redirect('add-depositor');
        
    }

    public function destroy($id){
        $depositor = DB::table('depositor')->where('id', '=' , $id )->delete();
        return redirect('add-depositor');
    }
}

?>