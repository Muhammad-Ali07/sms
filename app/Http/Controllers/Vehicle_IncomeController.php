<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;



class Vehicle_IncomeController extends Controller
{
    
    
    public function save_edit_driver_assign($id){
        $driver = DB::table('driver_name')->where('status',1)->get();
        $vehicle =DB::table('vehicles')->where('INTruck',1)->get();
        $assign = DB::table('assign_driver')->where('status',1)->get();
        $select = DB::table('assign_driver')->where('id',$id)->first();
        return view('vehicleIncome/assign-driver',compact('driver','vehicle','assign','select'));
    }
    
        public function vehicleaccidentManagement($id){
        
            return view('vehicleIncome.accident',compact('id'));
        }
        
        public function savevehicleaccidentManagement(Request $req){
        //dd($req->all());
        DB::table('accident_management')->insert([
                
                'VehicleNO'     => $req->id,
                'Reason'        => $req->reason,
                'accidentDate'  => date('Y-m-d')
        ]);
        DB::table('vehicles')->where('id',$req->id)->update([
            'INTruck' => 3,
        ]);
        return redirect('add-vehicle');
        }
        
        public function view_driver_form(){
        $select = DB::table('driver_name')->where('status',1)->get();
        return view('vehicleIncome/add-driver',compact('select'));    
        }
        public  function insert_drivers(Request $req){
        $driverName = $req->DriverName;
        $insert = DB::table('driver_name')->insert([
        'DriverName' => $driverName,
        ]);
        return redirect('view-driver-form');
        }
        public function edit_drivers($id){
        $select = DB::table('driver_name')->where('status',1)->get();   
        $query = DB::table('driver_name')->where('id',$id)->select('DriverName','id')->first();       
        return view('vehicleIncome/add-driver',compact('select','query'));   
        }
        public  function save_edit_drivers(Request $req){
        $driverName = $req->DriverName;
        $id =$req->id;
        $insert = DB::table('driver_name')->where('id',$id)->update([
        'DriverName' => $driverName,
        ]);
        return redirect('view-driver-form');
        }
        public function delete_drivers($id){
        DB::table('driver_name')->where('id',$id)->update([
        'status'=> 0,
        ]);
        return redirect('view-driver-form');
        }
        public function assign_Driver(){
        $driver = DB::table('driver_name')->where('status',1)->get();
        $vehicle =DB::table('vehicles')->where('INTruck',1)->get();
        $assign = DB::table('assign_driver')->where('status',1)->get();
        return view('vehicleIncome/assign-driver',compact('driver','vehicle','assign'));
        }
        
        
        public function delete_Driver_assign($id){
        
        DB::table('assign_driver')->where('id',$id)->update([
            'status' => 0,    
        ]);
         return redirect('assign-Driver');
        }
        public function save_assign_Driver(Request $req){   
        if(!empty($req->assignid)){
        $vechicleNO = $req->VechicleID;
        $DriverName = $req->DriverName[0];
        $designation = $req->designation[0];
        DB::table('assign_driver')->where('id',$req->assignid)->update([
        'VechicleNO' => $vechicleNO,
        'DriverID' => $DriverName,
        'Designation' =>  $designation, 
        ]);
        }    
        else{    
        $vechicleNO = $req->VechicleID;
        $DriverName = $req->DriverName;
        $designation = $req->designation;
        for($i = 0;  $i < count($DriverName); $i++){
        $insert = DB::table('assign_driver')->insert([
        'VechicleNO' => $vechicleNO,
        'DriverID' => $DriverName[$i],
        'Designation' =>  $designation[$i],
        ]);
        } 
        }
        return redirect('assign-Driver');
        }
        
        public function add_vehicle(){
        $select = DB::table('city')
        ->where('is_delete',1)
        ->get();
        $showvehicle = DB::table('vehicles')
        ->join('city','vehicles.registrationcity','city.id')
        ->where('vehicles.INTruck',1)
        ->where('vehicles.is_delete',1)
        ->select('vehicles.vehicleno','vehicles.ownername','vehicles.chasisno','vehicles.engineno'
        ,'vehicles.horsepower','vehicles.id','vehicles.nooftires','vehicles.vehicletype'
        ,'city.Cityname') 
        ->get();
    
        return view ('vehicleIncome.add-vehicle',compact('select','showvehicle'));
        }
        public function add_vehicle_process(Request $request){
        $vehicletype        = $request->vehicletype;
        $vehicleno          = $request->vehicleno;
        $modelno            = $request->modelno;
        $ownername          = $request->ownername;
        $status             = $request->status;
        $dateofparchase     = $request->dateofparchase;
        $chasisno           = $request->chasisno;
        $registrationcity   = $request->registrationcity;
        $nooftires          = $request->nooftires;
        $engineno            = $request->engineno;
        $horsepower          = $request->horsepower;
        $result = DB::table('vehicles')->insert([
        'vehicletype'    => $vehicletype,
        'vehicleno'        => $vehicleno,
        'modelno'         => $modelno,
        'ownername'         => $ownername,
        'status'            => $status,
        'dateofparchase'         => $dateofparchase,
        'chasisno'           => $chasisno,
        'registrationcity'         => $registrationcity,
        'nooftires'        => $nooftires,
        'engineno'         => $engineno,
        'horsepower'           => $horsepower,
        ]);
        return redirect('view-vehicle');
        }
        public function edit_process_vehicle(Request $request){
        $id                 = $request->id;
        $vehicletype        = $request->vehicletype;
        $vehicleno          = $request->vehicleno;
        $modelno            = $request->modelno;
        $ownername          = $request->ownername;
        $status             = $request->status;
        $dateofparchase     = $request->dateofparchase;
        $chasisno           = $request->chasisno;
        $registrationcity   = $request->registrationcity;
        $nooftires          = $request->nooftires;
        $engineno            = $request->engineno;
        $horsepower          = $request->horsepower;
        $result = DB::table('vehicles')
        ->where('id',$id)   
        ->update([
        'vehicletype'    => $vehicletype,
        'vehicleno'        => $vehicleno,
        'modelno'         => $modelno,
        'ownername'         => $ownername,
        'status'            => $status,
        'dateofparchase'         => $dateofparchase,
        'chasisno'           => $chasisno,
        'registrationcity'         => $registrationcity,
        'nooftires'        => $nooftires,
        'engineno'         => $engineno,
        'horsepower'           => $horsepower,
        ]);
        return redirect('view-vehicle');
        }
        
        
        
        public function delete_vehicle($id){
         
        $result = DB::table('vehicles')
        ->where('id',$id)   
        ->update([
        'is_delete' =>0
        ]);
        return redirect('view-vehicle');
        }
        public function edit_vehicle($id){
        $select = DB::table('city')
        ->get();
        $showvehicle = DB::table('vehicles')
        ->join('city','vehicles.registrationcity','city.id')
        ->where('vehicles.INTruck',1)
        ->select('vehicles.vehicleno','vehicles.ownername','vehicles.chasisno','vehicles.engineno'
        ,'vehicles.horsepower','vehicles.id','vehicles.nooftires','vehicles.vehicletype'
        ,'city.Cityname') 
        ->get();
        $query = DB::table('vehicles')
        ->where('id',$id)
        ->first();
        return view ('vehicleIncome.add-vehicle',compact('select','query','showvehicle'));
        }
        public function view_vehicle(){
        $showvehicle = DB::table('vehicles')
        ->join('city','vehicles.registrationcity','city.id')
        ->where('vehicles.INTruck',1)
        ->where('vehicles.is_delete',1)
        ->select('vehicles.vehicleno','vehicles.ownername','vehicles.chasisno','vehicles.engineno'
        ,'vehicles.horsepower','vehicles.id','vehicles.nooftires','vehicles.vehicletype'
        ,'city.Cityname') 
        ->get();
        $select = DB::table('city')
        ->where('is_delete',1)
        ->get();
        return view ('vehicleIncome.add-vehicle',compact('showvehicle','select'));
        }
        public function voucher_details(Request $request)
        {
        $name        = $request->name;
        $discription          = $request->discription;
        $result = DB::table('voucher_details')->insert([
        'name'    => $name,
        'discription'        => $discription,
        ]);
        if($result){
        return redirect()->back();
        }else{
        return redirect()->back();
        }
        }
        public function Vehicle_income_details(Request $request)
        {
        $name        = $request->name;
        $discription          = $request->discription;
        $result = DB::table('income_details')->insert([
        'name'    => $name,
        'discription'        => $discription,
        ]);
        return redirect()->back();
        }
        public function view_voucher_detail(){
        $incom = DB::table('voucher_details')
        ->where('is_delete',1)
        ->get(); 
        return view ('vehicleIncome.vehicle-expensive-detail',compact('incom'));
        }
        public function view_income_detail(){
        $dataa = DB::table('income_details')
        ->where('is_delete',1)
        ->get(); 
        return view ('vehicleIncome.vehicle-income-detail',compact('dataa'));
        }
        public function delete_income($id){
        $query = DB::table('income_details')
        ->where('id',$id)
        ->update([
        'is_delete' => 0
        ]);
        return redirect('view-income-detail');
        }
        public function delete_expense($id){
        $query = DB::table('voucher_details')
        ->where('id',$id)
        ->update([
        'is_delete' => 0
        ]);
        return redirect('vehicle-expensive-detail');
        }
        public function edit_income($id){
        $query =  DB::table('income_details')
        ->where('id',$id)
        ->first(); 
        $dataa = DB::table('income_details')
        ->where('is_delete',1)        
        ->get(); 
        return view ('vehicleIncome.vehicle-income-detail',compact('dataa','query'));
        }
        public function edit_income_process(Request $request){
        $id = $request->id;
        $name = $request->name;
        $discription = $request->discription;
        $result = DB::table('income_details')
        ->where('id',$id)
        ->update([
        'name'             => $name,
        'discription'             => $discription,
        ]);
        return redirect('view-income-detail');
        }
        public function edit_expense($id){
        $query =  DB::table('voucher_details')
        ->where('id',$id)
        ->first(); 
        $incom = DB::table('voucher_details')
        ->where('is_delete',1)
        ->get(); 
        return view ('vehicleIncome.vehicle-expensive-detail',compact('query','incom'));
        }
        public function edit_expense_process(Request $request){
        $id = $request->id;
        $name = $request->name;
        $discription = $request->discription;
        $result = DB::table('voucher_details')
        ->where('id',$id)
        ->update([
        'name'             => $name,
        'discription'             => $discription,
        ]);
        return redirect('view-voucher-detail');
        }
}