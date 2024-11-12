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

            
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                   Bilty Tracking
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                         
                         <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                             Tracking Search
                           </h2>
             </div>
             <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                         Add Record
                           </h2>
                         
                        </div>
                        
                        <form method="post" action="{{route('bilty-tracking-filter')}}"> 
                        @csrf
                        <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                        <div class="col-span-6 mt-2">
                            <label for="regular-form-6" class="form-label">Bilty No</label>
                            <input type="text" id="regular-form-6" class="form-control" placeholder="Enter Bilty Number" name="bilty_no">
                            <button class="btn btn-primary mt-5 ">Filter</button> 
                        </div>
                                       

                                       
                                    </div></form>
                                    
                        <div id="input" class="p-5">
                            <form method="post" @if(!empty($query)) action="{{route('edit-tracking-process')}}" @endif @if(empty($query)) action="{{route('bilty-tracking-process')}}" @endif>
               @csrf
                           <div class="preview">
                               <div class="grid grid-cols-12 gap-6 mt-5">
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-1"  class="form-label">Date</label>
                                    <input type="hidden"  value="@if(!empty($query)) {{$query->id}} @endif"" name="id">
                                    <input id="regular-form-2"  " required type="date" class="form-control" placeholder="Package Name" @if(!empty($query)) value="{{$query->Tracking_Date}}" @endif name="tackingdate">
                              </div>
                             
                                 
                                 <div class="col-span-6 mt-2">
                                <label for="regular-form-6" class="form-label">Bilty No</label>
                               <input type="text" id="regular-form-6" class="form-control"  placeholder="Enter Address" name="bilty_no">
                             
                             </div>
                              <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Station</label>
                             <select type="text" id="regular-form-6" class="form-control"  placeholder="Enter Address" name="trackingstation">

                             <option>select Station</option>
                             @foreach($station as $value)
                                 <option value="{{$value->id}}" @if(!empty($query)) @if($value->id == $query->Tracking_Station) {{'selected'}}  @endif @endif>{{$value->name}}</option>   
                                 @endforeach
                           </select>
                                 </div>
                                 
                                  <div class="col-span-6 mt-2">
                                    <label for="regular-form-6" class="form-label">Status</label>
	                                <select type="text" id="regular-form-6" class="form-control"  placeholder="Enter Address" name="status">

		                             <option>select Status</option>
		                                @foreach($status as $value)
		                                 <option value="{{$value->status}}" @if(!empty($query)) @if($value->id == $query->status) {{'selected'}}  @endif @endif>{{$value->status}}</option>
		                                 @endforeach
		                           </select>
                                 </div>

                                 
                              </div>
                              <button class="btn btn-primary mt-5">Submit</button>
                              <div class="btn btn-primary mt-5" id="Reset">Reset</div>
                              @if(empty($query))
                              <div id="input" class="p-5">
                           <div class="preview">
                              <table id="examples" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                        <th>S.No #</th>
                                       <th>Date</th>
                                       <th>Bilty.No #</th>
                                        <th>Truck No</th>
                                       <th>Station</th>
                                       
                                       <th>status</th>
                                       
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                      <?php  $counter = 1; ?>
                                  
                         @foreach($data as $row)
                         <?php
                         $station=DB::table('now_station')->where('id',$row->Tracking_Station)->first();
                       ?>
                                       <tr>
                                            <td>{{$counter++}}</td>
                                            <td>{{$row->Tracking_Date}}</td>
                                            <td>{{$row->bilty_ids}}</td>
                                            <td>{{$row->Tracking_Truck_no}}</td>
                                            <td>{{$station->name}}</td>
                                            <th>{{$row->status}}</th>
                                            <td><a href="{{route('edit-tracking', ['id' => $row->id]) }}">Edit</a>
                                            <a href="{{route('delete-tracking', ['id' => $row->id]) }}">Delete</a>
                                            </td>
                                       </tr>
                                  @endforeach 
                                 </tbody>
                                 <tfoot>
                                 <tr>
                                     <th>S.No #</th>
                                       <th>Date</th>
                                        <th>Truck No</th>
                                       <th>Station</th>
                                        <th>status</th>
                                       <th>Action</th>
                                    </tr>
                                 </tfoot>
                              </table>
                              @endif
                           </div>
                        </div>
                           </div>
                           </form>
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