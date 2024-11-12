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
            <form method="post" action=" @if(!empty($query)){{route('edit-monthly-bill-process')}} @endif   @if(empty($query)){{url('add-monthly-bill-process')}} @endif  ">
               @csrf
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                  Add a Monthly Bill
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              Add a Monthly Bill
                           </h2>
                         
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                               <div class="grid grid-cols-12 gap-6 mt-5">
                               <div class="col-span-4 mt-2">
                                    <label for="regular-form-1"  class="form-label">Bill No</label>

         
                                    <input  id="regular-form-2"   required type="text" class="form-control" placeholder="Bill No"  @if(!empty($query)) value="{{$query->bill_Number}}" @endif name="bill_no">
                                  
                                 </div>
                              <div class="col-span-4 mt-2">
                                    <label for="regular-form-1"  class="form-label">Company Name</label>
                                    <input type="hidden"  value="@if(!empty($query)) {{$query->id}} @endif"" name="bill_id">
        
                                    <select id="regular-form-2"   required type="text" class="form-control" placeholder="Package Name" name="customer">
                                   <option>Select Company</option>
                                    @foreach($sender as $customer )
                  <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach 
                                 </select>
                                 </div>
                                 @if(!empty($query)) 
   <input required type="hidden" name="bill_id" value="{{$query->bill_id}}">
                                 @endif
                              <div class="col-span-4 mt-2">
                                    <label for="regular-form-6" class="form-label">Destination Type</label>
                                    <select type="text" id="regular-form-6" class="form-control" value="@if(!empty($query)) {{$query->description}} @endif" placeholder="Enter Address" name="desType">
        
                                    <option value="Domestic">Domestic</option>
                              <option value="Export">Export</option>           
                                     </select>
                                 </div>
                         
                              <div class="col-span-4 mt-2">
                                    <label for="regular-form-6" class="form-label">Date</label>
                                    <input type="date" id="regular-form-6" class="form-control" value="@if(!empty($query)) {{$query->bill_date}} @endif" placeholder="Enter Address" name="month">
                              </div>
                              <div class="col-span-4 mt-2">
                                    <label for="regular-form-6" class="form-label">Amount</label>
                                    <input type="text" id="regular-form-6" class="form-control" value="@if(!empty($query)) {{$query->total}} @endif" placeholder="Enter Amount" name="amount">
                              </div>
                              </div>
                              <button class="btn btn-primary mt-5">Submit</button>
                              <!-- <div class="btn btn-primary mt-5" id="Reset">Reset</div> -->
                              <div id="input" class="p-5">
                              <div id="input" class="p-5">

<div class="preview">

<table id="example" class="display nowrap" style="width:100%">

<thead>

<tr>
   <th>S.No</th>
<th>Bill No</th>
<th>Company Name</th>
<th>Designation Type</th>
<th>Month</th>
<th>Amount</th>
 <th>Action</th> 

                                </tr>
                                
                                </thead>
                                
                                <tbody>
                                   <?php
                                   $count=1;
                                   ?>
                        @foreach($months as $month)
                                <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $month->bill_Number }}</td>
                                <td>{{ $month->name }}</td>
                                <td>{{ $month->desType }}</td>
                                <td>{{ $month->bill_date }}</td>
                                <td>{{ $month->total }}</td>
                               <td>
                                <!--<a href="{{route('edit-monthly-bill',['id'=>$month->id])}}"> Edit |  -->
                                <a  href="{{route('delete-monthly-bill',['id'=>$month->bill_id])}}"> Delete  </a>
                                </td> 
                                
                                </tr>
                                @endforeach

</table>
                           </div>
                        </div>
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