@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
   @include('includes.side-nav')

         <!-- BEGIN: Content -->

         <div class="content">

             <!-- BEGIN: Top Bar -->
        @include('includes.top-bar')
      <!-- END: Top Bar -->

            <div class="grid">

               <div class="intro-y flex items-center mt-12">

                  <h2 class="text-lg font-medium mr-auto">

                    Kharadar Office
                  </h2>

               </div>

               <div class="grid grid-cols-12 gap-6 mt-5">

                  <div class="intro-y col-span-12 lg:col-span-12">

                     <!-- BEGIN: Input -->

                     <div class="intro-y box">

                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                           <h2 class="font-medium text-base mr-auto">

                             Daily Cash Payment

                           </h2>

                           <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">

                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>

                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">

                              </div> -->

                        </div>

                        <form method="post" autocomplete="off" @if(!empty($query)) action="{{route('save-edit-campus')}}" @endif @if(empty($query)) action="{{route('save-add-campus')}}" @endif>
                         @csrf
                        <div id="input" class="p-5">

                           <div class="preview">

                              <div class="mt-2">

                              @if(!empty($query)) 
                              <input type="hidden" name="id" value="{{$query->id}}">
                                @endif 

                              </div>


                              <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                                  <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">Date</label>
    <input id="regular-form-2"  type="date" @if(!empty($query))  value="{{$query->Campus_Date}}"  @endif name="campusdate" class="form-control" placeholder="Enter Name" >
                                 </div>
                                    

                              <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">Cash Category</label>
    <select id="regular-form-2"  type="text" @if(!empty($query))  value="{{$query->Campus_Cash_Category}}"  @endif name="campuscategory" class="form-control cashamount" placeholder="Enter Name" >
      <option>please select</option>
      <option @if(!empty($query)) @if($query->Campus_Cash_Category=='Reciept') {{'selected'}}  @endif @endif>Reciept</option>
      <option @if(!empty($query)) @if($query->Campus_Cash_Category=='Paymnents') {{'selected'}}  @endif @endif>Paymnents</option>
            </select>
                                 </div>

                         <div class="col-span-4 positon-relative">
                                 
                              <label for="txtBox" class="form-label">Discription</label>
                                 <input id="regular-form-2" type="text" @if(!empty($query))  value="{{$query->Campus_Description}}"  @endif   name="campusdescription" class="form-control" placeholder="Enter Discription" >
                              
                              
                              </div> 

                               <div class="col-span-4 positon-relative">
                                 
                              <label for="txtBox" class="form-label">Refrence</label>
                                 <input id="regular-form-2" type="text" @if(!empty($query))  value="{{$query->Campus_Reference}}"  @endif   name="campusreference" class="form-control" placeholder="Enter Discription" >
                              
                              
                              </div> 

                                  

                  <div id="recieptamount" style="display: none;" class=" col-span-4 positon-relative">
                                 
                              <label for="txtBox" class="form-label">Reciept Amount</label>
                                 <input id="regular-form-2" type="text" @if(!empty($query))  value="{{$query->Campus_Reciept_Amount}}"  @endif   name="campusrecieptamount" class="form-control" placeholder="Enter Reciept Amount" >
                              
                              
                              </div>
                        
                            
                        
                              <div style="display: none;" class="paymentamount col-span-4 positon-relative">
                              <label for="regular-form-2" class="form-label">Paymnet</label>
                              <input id="regular-form-2"  type="text" @if(!empty($query))  value="{{$query->Campus_Payment_Amount}}"  @endif name="campuspaymentamount" class="form-control" placeholder="Enter Payment Amount" >

                              </div>
                           

                              </div>  
                              </div>
                              </div>


                              <button  class="btn btn-primary mt-5">Submit</button>

                           </form>


                             <div id="input" class="p-5">

                           <div class="preview">
                         
                           <table id="example" class="display nowrap" style="width:100%">

<thead>

   <tr>
   <th>S.No</th>
    <th>Date</th>
   <th>Discription</th>
      <th>Refrence</th>
      <th>Reciepts</th>
      <th>Payment</th>
      <th>Action</th>
     

   </tr>

</thead>

<tbody>
<?php $serial = 0; ?>
@foreach($heading as $row)
<?php $serial += 1; ?>
   <tr>
   <td>{{$serial}}</td>
       <td>{{$row->Campus_Date}}</td>
      <td>{{$row->Campus_Description}}</td>
       <td>{{$row->Campus_Reference}}</td>
    <td>{{$row->Campus_Reciept_Amount}}</td>
  <td>{{$row->Campus_Payment_Amount}}</td>

      <td>
       <a href="edit-campus/{{$row->id}}">Edit</a>  |
         <a href="delete-campus/{{$row->id}}">Delete</a> 




      </td>
   </tr>
@endforeach
</table>

 </div>
 </div>

                           </div>

                        </div>

                     </div>
                          
@section('script')
<script>
   $('.cashamount').on('change',function(){
     
      var id  = $(this).val();
      if(id=='Reciept'){
      $('#recieptamount').show();
      $('.paymentamount').hide();
      }
      if(id=='Paymnents'){
      $('#recieptamount').hide();
      $('.paymentamount').show();
      }
       });
   </script>
@endsection

      <!-- BEGIN: Dark Mode Switcher-->

      <!-- BEGIN: Dark Mode Switcher-->

      <!-- BEGIN: JS Assets-->
