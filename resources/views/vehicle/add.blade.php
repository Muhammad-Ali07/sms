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
            <form method="post" action="@if(!empty($edit)) {{route('edit-vehicle-process')}}  @endif  @if(empty($edit)) {{route('add-vehicle-process')}}  @endif">
               @csrf
               @if(!empty($edit))
               <input type="hidden" name="id" value="{{$edit->id}}">
               @endif

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
                                 <label for="regular-form-2" class="form-label">Category</label>
                                 <input required id="regular-form-2" value="@if(!empty($edit)) {{$edit->vehiclecat}} @endif" type="text" class="form-control" placeholder="Enter Category" name="vehiclecat">
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-2" class="form-label">Driver</label>
                                 <input id="regular-form-2"  value="@if(!empty($edit)) {{$edit->driver}} @endif"  type="text" class="form-control" placeholder="Enter Driver"  name="driver">
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-2" class="form-label">Broker/Owner</label>
                                 <input id="regular-form-2" value="@if(!empty($edit)) {{$edit->owner}} @endif" type="text" class="form-control" placeholder="Enter Broker/Owner"  name="owner">
                              </div>
                              <div class="mt-2">
                                 <label for="txtBox" class="form-label">Status</label>
                                 <select required id="txtBox" class=" form-select sm:mr-2 " aria-label="Default select example" name="status">
                                    <option>@if(!empty($edit)) {{$edit->status}} @endif</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                 </select>
                              </div>
                              <div class="mt-2">
                                 <label for="txtBox" class="form-label">Vehicle Type</label>
                                 <select required id="txtBox" class="form-select sm:mr-2" aria-label="Default select example" name="vtype">
                                    <option>@if(!empty($edit)) {{$edit->vtype}} @endif</option>
                                    <option>Truck</option>
                                   
                                    <option>Lorry</option>
                                    <option>Mazda</option>
                                 </select>
                              </div>
                              <div class="mt-2">
                                 <label for="regular-form-4" class="form-label">Vechile No</label>
                                 <input required id="regular-form-4" value="@if(!empty($edit)) {{$edit->vno}} @endif" type="text" class="form-control" placeholder="Enter Car No" name="vno">
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