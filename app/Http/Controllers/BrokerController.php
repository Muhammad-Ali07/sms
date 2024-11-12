<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\VehicleType;
use App\Other;
use App\Broker;
use App\NowBank;
use App\NowPhone;

class BrokerController extends Controller
{


      public function add_broker()
    {

        $vehicleTypes = VehicleType::all();

        return view('broker.add',compact('vehicleTypes'));

    }

      public function add_broker_process(Request $request)
    {

        $request->validate([
            'vehicle_types' => 'required|array|min:1',
        ], [
            'vehicle_types.required' => 'Please select at least one vehicle type.',
            'vehicle_types.min' => 'Please select at least one vehicle type.',
        ]);

        $broker_phone = $request->broker_phone;
        $city = $request->broker_city;
        $broker_limit = $request->broker_limit;
        $title = $request->title;
        $broker_cnic = $request->broker_cnic;
        $broker_name = $request->broker_name;
        $vehicle_types = implode(' , ', $request->input('vehicle_types'));
        $veh_selection = implode(' , ', $request->input('veh_selection'));
        $broker_phone_2 = $request->broker_phone_2;
        $last_id = DB::table('broker')->insertGetId([
            'broker_name' => $broker_name,
            'broker_city' => $city,
            'vehicle_types' => $vehicle_types,
            'broker_limit' => $broker_limit,
            'broker_phone_2' => $broker_phone_2,
            'veh_selection' => $veh_selection
        ]);

        $title = $request->input('title');
        $bank_name = $request->input('bank_name');
        $broker_bank = $request->input('broker_bank');

            $bankRecords = [];

            foreach ($title as $key => $value) {
                $bankRecords[] = [
                    'title' => $value,
                    'bank_name' => $bank_name[$key],
                    'broker_bank' => $broker_bank[$key],
                    'broker_id' => $last_id,
                ];
            }

            NowBank::insert($bankRecords);

            $phoneRecords = [];
            foreach ($broker_phone as $key => $value) {
                $phoneRecords[] = [
                    'phone' => $value,
                    'broker_id' => $last_id,
                ];
            }

            NowPhone::insert($phoneRecords);

         $fileData = [];
         if ($request->has('doc_name') && $request->has('doc_file')) {
             $docNames = $request->input('doc_name');
             $docFiles = $request->file('doc_file');

             foreach ($docFiles as $index => $file) {
                 if ($file->isValid()) {
                     $filePath = $file->store('documents');
                     $fileData[] = [
                         'doc_name' => $docNames[$index],
                         'doc_file' => $filePath,
                         'broker_id' => $last_id,
                     ];
                 }
             }
         }
         foreach ($fileData as $data) {
             Other::create($data);
         }


        return redirect('add-broker');
    }

    public function index(Request $request){
        $query = DB::table('broker')
        // ->join('other','broker.broker_id','other.broker_id')
        ->orderby('broker_id', 'desc');


        if ($request->has('broker_name')) {
            $query->where('broker_name', 'like', '%' . $request->input('broker_name') . '%');
        }



        if ($request->has('broker_phone')) {
            $query->where('broker_phone', 'like', '%' . $request->input('broker_phone') . '%');
        }



        if ($request->has('broker_city')) {
            $query->where('broker_city', 'like', '%' . $request->input('broker_city') . '%');
        }

        // Execute the query and get the results

        $VehicleType = VehicleType::all();
        // return
        $brokerData = $query->get();
        return view('broker.view', compact('brokerData','VehicleType'));

    }

  public function view_broker()
    {

         $brokerData = Broker::with('other','now_bank','now_broker_phone')->get();
        return view('broker.view', compact('brokerData'));

    }

    public function view_broker_single($id){

        $brokerData = Broker::with('other','now_bank','now_broker_phone')->where('broker_id',$id)->first();
        return view('broker.view_single', compact('brokerData'));
    }

    public function  deleteBroker($id){
        Broker::where('broker_id',$id)->delete();
        NowBank::where('broker_id',$id)->delete();
        NowPhone::where('broker_id',$id)->delete();
        Other::where('broker_id',$id)->delete();
        return redirect()->route('add-broker');
    }

    public function brokerEdit($id){
        $vehicleTypes = VehicleType::all();
        $select = Broker::with('other','now_bank','now_broker_phone')->where('broker_id',$id)->first();
        $selectedVehicleTypes = explode(' , ', $select->vehicle_types);
        $bankRecords = $select->now_bank;

        return view('broker.add', compact('select','vehicleTypes','selectedVehicleTypes','bankRecords'));

    }

    public function brokerUpdate($id,Request $request){

        $request->validate([
            'vehicle_types' => 'required|array|min:1',
        ], [
            'vehicle_types.required' => 'Please select at least one vehicle type.',
            'vehicle_types.min' => 'Please select at least one vehicle type.',
        ]);

        $broker_id= $id;
        $broker = Broker::where('broker_id',$broker_id)->first();

        $broker->vehicle_types = implode(' , ', $request->input('vehicle_types'));

        $broker->broker_name = $request->input('broker_name');
        $broker->broker_city = $request->input('broker_city');
        $broker->broker_limit = $request->input('broker_limit');
        $broker->veh_selection = implode(' , ', $request->input('veh_selection'));
        $broker->broker_phone_2 = $request->input('broker_phone_2');
        $broker->save();

        // dd($request->all());
        $title = (array)$request->input('title')[0];
        $bank_name = (array)$request->input('bank_name');
        $broker_bank = (array)$request->input('broker_bank');

        $bankRecords = [];
        foreach ($title as $key => $value) {
            $bankRecords[] = [
                'title' => $value,
                'bank_name' => $bank_name[$key],
                'broker_bank' => $broker_bank[$key],
                'broker_id' => $broker->broker_id,
            ];
        }

        NowBank::where('broker_id', $broker->broker_id)->delete();
        NowBank::insert($bankRecords);

        $phoneRecords = [];
        foreach ($request->input('broker_phone') as $value) {
            $phoneRecords[] = [
                'phone' => $value,
                'broker_id' => $broker->broker_id,
            ];
        }

        NowPhone::where('broker_id', $broker->broker_id)->delete();
        NowPhone::insert($phoneRecords);

        // Handle document files
        $fileData = [];
        $existingFiles = Other::where('broker_id', $broker->broker_id)->get();
        
        if ($request->has('doc_name')) {
            $docNames = $request->input('doc_name', []);
            $docFiles = $request->file('doc_file', []);
        
            foreach ($docNames as $index => $docName) {
                // Check if a file was uploaded for this document
                if (isset($docFiles[$index]) && $docFiles[$index]->isValid()) {
                    // Store the new file
                    $filePath = $docFiles[$index]->store('documents');
        
                    // Update the existing file record if it exists or create a new one
                    $existingRecord = $existingFiles->where('doc_name', $docName)->first();
                    if ($existingRecord) {
                        $existingRecord->update([
                            'doc_file' => $filePath,
                        ]);
                    } else {
                        // If no existing record, create a new one
                        Other::create([
                            'doc_name' => $docName,
                            'doc_file' => $filePath,
                            'broker_id' => $broker->broker_id,
                        ]);
                    }
                } else {
                    // If no file is uploaded, retain the existing file in the database
                    $existingRecord = $existingFiles->where('doc_name', $docName)->first();
                    if ($existingRecord) {
                        // Add the existing file data to keep it intact
                        $fileData[] = [
                            'doc_name' => $existingRecord->doc_name,
                            'doc_file' => $existingRecord->doc_file,
                            'broker_id' => $existingRecord->broker_id,
                        ];
                    }
                }
            }
        
            // Insert or update the document data for the updated records
            if (!empty($fileData)) {
                foreach ($fileData as $data) {
                    Other::updateOrCreate(
                        ['broker_id' => $broker->broker_id, 'doc_name' => $data['doc_name']],
                        ['doc_file' => $data['doc_file']]
                    );
                }
            }
        }

        //   // Handle document files
        //   $fileData = [];
        //   if ($request->has('doc_name') && $request->has('doc_file')) {
        //       $docNames = $request->input('doc_name', []);
        //       $docFiles = $request->file('doc_file', []);
    
        //       foreach ($docFiles as $index => $file) {
        //           if ($file && $file->isValid()) {
        //               $filePath = $file->store('documents');
        //               $fileData[] = [
        //                   'doc_name' => $docNames[$index] ?? null,
        //                   'doc_file' => $filePath,
        //                   'broker_id' => $broker->broker_id,
        //               ];
        //           }
        //       }
    
        //       // Delete old document records and insert updated ones
        //       Other::where('broker_id', $broker->broker_id)->delete();
        //       if (!empty($fileData)) {
        //           foreach ($fileData as $data) {
        //               Other::create($data);
        //           }
        //       }
        //   }

        return redirect()->route('add-broker')->with('success', 'Broker details updated successfully.');


    }
}