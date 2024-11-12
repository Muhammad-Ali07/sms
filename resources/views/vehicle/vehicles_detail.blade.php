@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
 <div class="flex">   
    @include('includes.side-nav')
        <div class="content">
           <!-- BEGIN: Top Bar -->
        @include('includes.top-bar')
      <!-- END: Top Bar -->
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                     Vehicles Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Vehicles Form
                           </h2>    
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                              <table id="examples" class="display nowrap" style="width:100%">
                                 <thead>
                                  <thead>
                                    <tr>
                                       <th>Vehicle Category</th>
                                       <th>Driver</th>
                                       <th>Owner</th>
                                       <th>Status</th>
                                       <th>Vehicle Type</th>
                                       <th>Vehicle No</th>
                                        <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
                                          @foreach($vehicles as $vrow)
                                          
                                              <tr>   
                                                 <td>{{$vrow->vehiclecat}}</td>
                                                 <td>{{$vrow->driver}}</td>
                                                 <td>{{$vrow->owner}}</td>
                                                 <td>{{$vrow->status}}</td>
                                                 <td>{{$vrow->vtype}}</td>
                                                 <td>{{$vrow->vno}}</td>
                                                 <td><a href="vehicles-edit/{{$vrow->id}}">EDIT</a> |
                                                 <a 
                                    <a id="deletecustomer" onclick="return confirm('Are you sure you want to delete {{$vrow->vno}} ?')" href="vehicles-delete/{{$vrow->id}}">Delete</a>
                                                </td>
                                              </tr>
                                             @endforeach
                                     
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                       <th>Vehicle Category</th>
                                       <th>Driver</th>
                                       <th>Owner</th>
                                       <th>Status</th>
                                       <th>Vehicle Type</th>
                                       <th>Vehicle No</th>
                                        <th>Action</th>
                                    </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Vehicles Payment Details
                           </h2>
                          
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                              <table id="examples" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th>Vehicle</th>
                                       <th>Condition</th>
                                       <th>Per Month</th>
                                       <th>Total Month</th>
                                       <th>Purhase</th>
                                       <th>Pay Mode</th>
                                       <th>Total Price</th>
                                       <th>Cash Price</th>
                                 
                                    </tr>
                                 </thead>
                                 <tbody>
                                      @foreach($vehiclepayments as $vehiclepayment)

									  <tr>
										<td>
                                 <?php
                                  $VpName = DB::table('now_vehicles')->where('id',$vehiclepayment->vehicle)->first();
                                 
                                  ?>
                                  {{$VpName->vno}} 
                                 </td>
										<td> {{ $vehiclepayment->condition }} </td>
										<td> {{ $vehiclepayment->permonth }} </td>
										<td> {{ $vehiclepayment->totalmonth }} </td>
										<td> {{ $vehiclepayment->purchaseform }} </td>
										<td> {{ $vehiclepayment->paymode }} </td>
										<td> {{ $vehiclepayment->totalprice }} </td>
										<td> {{ $vehiclepayment->cashprice }} </td>
									  </tr>
									  @endforeach
                                 </tbody>
                                 <tfoot>
                                   <tr>
                                       <th>Vehicle</th>
                                       <th>Condition</th>
                                       <th>Per Month</th>
                                       <th>Total Month</th>
                                       <th>Purhase</th>
                                       <th>Pay Mode</th>
                                       <th>Total Price</th>
                                       <th>Cash Price</th>
                                     
                                    </tr>
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Book Payment Details
                           </h2>
                           <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                              </div> -->
                        </div>
                        
                        </div>
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
            </div>
         </div>
     </div>
@endsection