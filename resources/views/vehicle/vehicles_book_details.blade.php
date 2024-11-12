@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
 <div class="flex">

            <!-- BEGIN: Side Menu -->
    @include('includes.side-nav')

       <div class="content">
        <!-- BEGIN: Top Bar -->
        @include('includes.top-bar')
      <!-- END: Top Bar -->
         <form method="post" action="{{route('add-vehicles-boook-detail')}}">
            @csrf
         <div class="grid">
            <div class="intro-y flex items-center mt-12">
               <h2 class="text-lg font-medium mr-auto">
                  Vehicles Book Details
               </h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
               <div class="intro-y col-span-12 lg:col-span-12">
                  <!-- BEGIN: Input -->
                  <div class="intro-y box">
                     <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                           Add a Vehicles Book Details
                        </h2>
                        <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                           <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                           <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                           </div> -->
                     </div>
                     <div id="input" class="p-5">
                        <div class="preview">
                           <div class="mt-2">
                              <label for="regular-form-2" class="form-label">Vehcile</label>
                              <input id="regular-form-2" type="text" class="form-control" placeholder="Enter Vehicle" name="vehicle">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-2" class="form-label">Marke</label>
                              <input id="regular-form-2" type="text" class="form-control" placeholder="Enter Marke"  name="mark">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-2" class="form-label">Style</label>
                              <input id="regular-form-2" type="text" class="form-control" placeholder="Enter Style"  name="style">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Horse Power</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Horse Power" name="horsepower">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Book Sr, no</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Book Sr, no" name="booksir">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Vehicle Size</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Vehicle Size"  name="vehiclesize">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Engine No</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Engine No"  name="engineno">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Reg Date</label>
                              <input id="regular-form-4" type="date" class="form-control" placeholder="Enter Reg Date" name="regdate">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Unloaden Weight</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Unloaden Weight"  name="unloadenweight">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Manufacture Date</label>
                              <input id="regular-form-4" type="date" class="form-control" placeholder="Enter Manufacture Date"   name="manudate">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Jughi</label>
                              <div class="flex flex-col sm:flex-row mt-2">
                                 <div class="form-check mr-2">
                                    <input id="radio-switch-4" class="form-check-input" type="radio" value="YES"   name="jughi">
                                    <label class="form-check-label" for="radio-switch-4">Yes</label>
                                 </div>
                                 <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="jughi" value="NO">
                                    <label class="form-check-label" for="radio-switch-5" >No</label>
                                 </div>
                              </div>
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Model Year</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Model Year"  name="modelyear" >
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Cylinder</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Cylinder"  name="cylinder">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Loaden Weight</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Loaden Weight"  name="loadenweight">
                           </div>
                          
                           <div class="mt-2">
                              <div class="flex flex-col sm:flex-row mt-2">
                                 <div class="form-check mr-2">
                                    <input id="radio-switch-6" class="form-check-input" type="radio"  value="HGV" name="hgv">
                                    <label class="form-check-label" for="radio-switch-6">HGV</label>
                                 </div>
                                 <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="radio-switch-7" class="form-check-input" type="radio" value="LTV" name="hgv">
                                    <label class="form-check-label" for="radio-switch-7">LTV</label>
                                 </div>
                              </div>
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">No of Tyre</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter No of Tyre" name="nooftyre"> 
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Chasis No</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Chasis No"  name="chasisno">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Reg City</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Reg City"   name="regcity">
                           </div>
                           <div class="mt-2">
                              <label for="regular-form-4" class="form-label">Seating Capacity</label>
                              <input id="regular-form-4" type="text" class="form-control" placeholder="Enter Seating Capacity"  name="seatingcapacity">
                           </div>
                           <button class="btn btn-primary mt-5">Submit</button>
                        </div>
                     </div>
                  </div>
                  <!-- END: Input -->
                  <!-- BEGIN: Input Sizing -->
               </div>
            </div>
         </div>
         </form>
      </div>

     </div>
@endsection