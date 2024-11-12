<?php

namespace App\Http\Controllers\mehmoodemployee;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Client;
use Hash;
use mpdf\mpdf;
use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;
use App\User;
use App\PackageMetaDescription;
use App\Package;
use App\Packmetas;
use App\Customer;
use App\Biltymeta;
use App\RatelistValue;
use App\dbmodel;
use View;
use Auth;

class Packages extends BaseController
{



    public function packages(){

      $packages = Package::orderBy('id','desc')->with('customerpackage')->with('packages_metas')->get();

      $customer = Customer::get(); 
    
        
    return View('mehmoodgoodemployee/packages')->with(compact("packages",$packages,"customer",$customer));
    }
     public function insert(Request $req){
     // dd($req->all());
          $Validation = $req->validate([
      'package' => 'required|unique:packages_metas,package_name',
      'description' => 'required',    
      ]);
         
       $packages_meta = $req->input('package');
       $description =  $req->input('description');
        

     $packages = new Package;
      
       $packages->save();
       $fkid = $packages->id;

       $packages_metas = new Packmetas;
       $packages_metas->package_name =  $packages_meta;
     //  $packages_metas->description =  $description;
       $packages_metas->packages_id =  $fkid;
       $packages_metas->save();
       foreach ($description as $key => $value) {
         $metadescription =  new PackageMetaDescription;
         $metadescription->package_id = $packages_metas->id;
         $metadescription->description = $value;
         $metadescription->save();
       }



        return redirect('/mehmoodgoodemployee/packages')->with('message',"Package for Customer Added Successfully");
   
           
//                $Validation = $req->validate([
//                'package.*' => 'required|distinct',
//                'weight.*'  => 'required',
//                'packagetype.*' => 'required',
//                'description.*' => 'required',
//                'customer_name' => 'required',
             
//             ],[
//                 'package.*distinct' => 'Two Packages have same name!',
//               ]);
//                // dd($req->all());

//        $customer_name = $req->input('customer_name');               
//        $packages_metas = $req->input('package');
//        $weight =  $req->input('weight');
//        $packagetype =  $req->input('packagetype');
//        $description =  $req->input('description');
        

//        $packageexist = Package::where('customer_id',$customer_name)->first();  
      
//        if($packageexist=="")
//        { 
//        $packages = new Package;
//        $packages->customer_id = $customer_name;
//        $packages->save();
//        $fkid = $packages->id;

//       }
//       else{
//         $fkid =$packageexist->id;
//       }
// //dd($packages_metas);
//      foreach ($packages_metas as $key => $value) {
//         # code...

//        $packages_metas = new Packmetas;
//        $packages_metas->package_name =  $value;
//        $packages_metas->weight =  $weight[$key];
//        $packages_metas->package_type =  $packagetype[$key];
//        $packages_metas->description =  $description[$key];
//        $packages_metas->packages_id =  $fkid;
//        $packages_metas->save();
// }

//         return redirect('/mehmoodgoodemployee/packages')->with('message',"Package for Customer Added Successfully");
    }
     public function view($id){
    	  
           
       
        $packages = Package::with('customerpackage')->with('packages_metas.PackageMetaDescription')->where(['id'=>$id])->get();

         $customer = Customer::get(); 
    
        
    return view('mehmoodgoodemployee/packagesview')->with(compact("packages",$packages,"customer",$customer));
    }
    public function addpackages(){

      $packages = Package::with('customerpackage')->with('packages_metas')->get();

      $customer = Customer::with('user_single_package')->get(); 
    return view('mehmoodgoodemployee/addpackages')->with(compact("packages",$packages,"customer",$customer));
    }

        public function deletepackages(Request $request){
          $getID = Packmetas::where('packages_id', $request->id)->first();
          $bilty = Biltymeta::where('packing_id', $getID['id'])->first();
          $ratelist = RatelistValue::where('package_id', $getID['id'])->first();
          if($bilty || $ratelist){
            return response()->json(['status' => false, 'error'=> 'Package you remove is already exist in your Bilty or Ratelist']);
          }/*else{
            Biltymeta::where('packing_id', $getID['id'])->delete();
            RatelistValue::where('package_id', $getID['id'])->delete();
            return response()->json(['status' => false, 'error'=> 'Package has removed successfully']);
          }*/
        }

     public function edit($id){
      $packages = Package::with('customerpackage')->with('packages_metas.PackageMetaDescription')->where(['id'=>$id])->get();
      $customer = Customer::get(); 
           
        
    return view('mehmoodgoodemployee/packagesupdate')->with(compact("packages",$packages,"customer",$customer));
    }


    public function update(Request $req)
    {
      $Validation = $req->validate([
        'package' => 'required|unique:packages_metas,package_name,'.$req->package_meta_id,
        'description' => 'required',
      ]);

      $id =  $req->input('package_meta_id');               
      $packages_meta = $req->input('package');
      $description =  $req->input('description');
      $package_meta = Packmetas::where('id', $id)->update([
        'packages_id'   =>  $req->pkid,
        'package_name'  =>  $req->package,
      ]);
      $metadeletedesc = PackageMetaDescription::where('package_id',$id)->delete();
      foreach ($req->description as $key => $value) {
         $metadescription =  new PackageMetaDescription;
         $metadescription->package_id = $id;
         $metadescription->description = $value;
         $metadescription->save();
       }

      return redirect('/mehmoodgoodemployee/packages')->with('message',"Package Updated Successfully");
    
//           //for validation
//            $Validation = $req->validate([
//              'package.*' => 'required|distinct',
//                'weight.*'         => 'required',
//                'packagetype.*' => 'required',
//                'description.*' => 'required',
//                'customer_name' => 'required',
             
//            ],[
//             'package.*distinct' => 'Two Packages have same name!',
//           ]);

//          // dd($req->all());
//           //  if(count($req->newstation)){
//           //   $station_intersection = array_intersect($req->station, $req->newstation);

//           //   if(count($station_intersection)){
//           //     return back()->with('error', 'New Station must be different from old ones.');
//           //   }
//           // }



//           $id =  $req->input('pkid');     
//           $customer_name = $req->input('customer_name');               
//           $packages_metas = $req->input('package');
//           $weight =  $req->input('weight');
//           $packagetype =  $req->input('packagetype');
//           $description =  $req->input('description');
          
//           $packages =  Package::whereId($id)->first();
//           // $packages->customer_id = $customer_name;
//           // $packages->update();
//           $old_package_metas = Packmetas::where('packages_id', $id)->get();
//           $checkbilty = Biltymeta::whereIn('packing_id',$req->package_meta_id)->get();


//           $ratelist_values = [];
//           $old_package_metas_array = [];
//           $ratelist_values_package_id = [];
//           foreach ($old_package_metas as $key => $value) {
//             # code...
//             // dd($value);
//             $old_package_metas_array[] = $value->id;
//             $ratelist_values[] = RatelistValue::where('package_id', $value->id)->first();
            
//             // dd($ratelist_values_package_id);
//           }
//           // dd(count($ratelist_values) , count($packages_metas));
//           $diff_values = array_diff($old_package_metas_array, $req->package_meta_id);
//           // dd($old_package_metas, $diff_values);

//           if(Biltymeta::whereIn('packing_id',$diff_values)->exists()){
//             return back()->with('error', 'Package you remove is already exist in your Builty');
//           }

//           // dd("neither");
//           if(count($ratelist_values) > count($packages_metas)){
//             // dd("In");
//             foreach ($ratelist_values as $key => $value) {
//               # code...
//               // dd($value);
//               if($value !== null){

//                 $ratelist_values_package_id[] = $value->package_id;
//               }
//             }

//               $intersect_ratelist_value = array_intersect($ratelist_values_package_id, $req->package_meta_id);
//               $diff_array = array_diff($ratelist_values_package_id, $intersect_ratelist_value);
//               $update_values = array_diff($req->package_meta_id, $intersect_ratelist_value);
//               $update_all = array_merge($intersect_ratelist_value, $update_values);
//               // dd($update_all);

//               $delete_value = array_diff($old_package_metas_array, $req->package_meta_id);

//             if (count($diff_array)) {
//               $del_ratelist_values = RatelistValue::whereIn('package_id', $diff_array)->delete();
//             }

//             for ($i=0; $i < count($update_all) ; $i++) { 
//               // dd($update_all);
//               $pack_data = Packmetas::where('id', $update_all[$i])->first();
//               $pack_data->package_name =  $packages_metas[$i];
//               $pack_data->weight =  $weight[$i];
//               $pack_data->package_type =  $packagetype[$i];
//               $pack_data->description =  $description[$i];
//               $pack_data->update();
//             }

//             for ($i=0; $i < count($delete_value) ; $i++) { 
//               Packmetas::whereIn('id', $delete_value)->delete();
//             }
//           }


//           if(count($ratelist_values) <= count($packages_metas)){
//             // dd("In");

//             for ($i=0; $i < count($old_package_metas) ; $i++) { 
//               // dd($packages_metas[$i]);
//               $old_package_metas[$i]->package_name =  $packages_metas[$i];
//               $old_package_metas[$i]->weight =  $weight[$i];
//               $old_package_metas[$i]->package_type =  $packagetype[$i];
//               $old_package_metas[$i]->description =  $description[$i];
//               $old_package_metas[$i]->update();
//               // $old_package_metas->packages_id = $packages->id;
//             }
//           }
//           if(count($ratelist_values) < count($packages_metas)){
//             for ($i=count($old_package_metas); $i < count($packages_metas) ; $i++) {
//             // dd($i);
//               $new_packages_metas = new Packmetas;
//               $new_packages_metas->package_name =  $packages_metas[$i];
//               $new_packages_metas->weight =  $weight[$i];
//               $new_packages_metas->package_type =  $packagetype[$i];
//               $new_packages_metas->description =  $description[$i];
//               $new_packages_metas->packages_id = $packages->id;
//               $new_packages_metas->save();
//             }
//           }
//           // dd("Out");
// //        foreach ($packages_metas as $key => $value) {
// //         # code...

// //        $packages_metas = new Packmetas;
// //        $packages_metas->package_name =  $value;
// //        $packages_metas->weight =  $weight[$key];
// //        $packages_metas->package_type =  $packagetype[$key];
// //        $packages_metas->description =  $description[$key];
// //        $packages_metas->packages_id = $packages->id;
// //        $packages_metas->save();

// //        // $packages_metas->id;
// // }
     
//           // DB::table('packages_metas')->where(['packages_id'=>$id])->delete();
        
         
//         return redirect('/mehmoodgoodemployee/packages')->with('message',"Package for Customer Updated Successfully");

      // dd($id);
    }



}
