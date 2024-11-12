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
            <form method="post" action="{{ route('add-vehicle-payment') }}">
               @csrf
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                     Vehicles Payment Details
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              Add a Vehicles
                           </h2>
                           <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                              </div> -->
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                              <div class="mt-2">
                                 <label for="regular-form-2" class="form-label">Vehicle</label>
                                 <select required id="txtBox" class="form-select sm:mr-2" aria-label="Default select example" name="vehicle">
                                    
                                          @foreach($vehicles as $vehicle) 
                                            <option value="{{$vehicle->id}}"> {{$vehicle->vno}} </option>
                                         @endforeach
                                 </select>
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-2" class="form-label">Condition</label>
                                 <select id="txtBox" class="form-select sm:mr-2" aria-label="Default select example" name="condition">
                                    <option>Select</option>
                                    <option>Good</option>
                                    <option>Normal</option>
                                    <option>Fair</option>
                                 </select>
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-2" class="form-label">Purchase From</label>
                                 <input id="regular-form-2" type="text" class="form-control" placeholder="Enter Purchase From" name="purchaseform">
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-2" class="form-label">Per Month</label>
                                 <input id="regular-form-2" type="text" class="form-control" placeholder="Enter Per Month" name="permonth">
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-2" class="form-label">Total Month</label>
                                 <input required id="regular-form-2" type="text" class="form-control" placeholder="Enter Total Month" name="totalmonth">
                              </div>
                              <div class="mt-2">
                                 <label for="txtBox" class="form-label">Purchase</label>
                                 <select required id="txtBox" class="form-select sm:mr-2" aria-label="Default select example"  name="purchase">
                                    <option>Select</option>
                                    <option>New</option>
                                    <option>Used</option>
                                 </select>
                              </div>
                              <div class="mt-2">
                                 <label for="txtBox" class="form-label">Pay mode</label>
                                 <select id="txtBox" class="form-select sm:mr-2" aria-label="Default select example"  name="paymode">
                                    <option>Select</option>
                                    <option>Cash</option>
                                    <option>Lease</option>
                                 </select>
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-4" class="form-label">Purchase Date</label>
                                 <input required id="regular-form-4" type="date" class="form-control" placeholder="Enter Purchase Date" name="purchasedate">
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-4" class="form-label">Advance</label>
                                 <input required id="regular-form-4" type="text" class="form-control" placeholder="Enter Advance"  name="advance">
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-4" class="form-label">Total Price</label>
                                 <input required id="regular-form-4" type="text" class="form-control" placeholder="Enter Total Price" name="totalprice">
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-4" class="form-label">Cash Price</label>
                                 <input required id="regular-form-4" type="text" class="form-control" placeholder="Enter Cash Price" name="cashprice">
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