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
      Daily Labour Payment
   </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
   <div class="intro-y col-span-12 lg:col-span-12">
      <!-- BEGIN: Input -->
      <div class="intro-y box">
         <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               Daily Labour Payment
            </h2>
         </div>
         <form method="post" autocomplete="off" @if(!empty($query)) action="{{route('save-edit-mazda-expense')}}" @endif @if(empty($query)) action="{{route('save-mazda-expense')}}" @endif>
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
                     <input id="regular-form-2"  type="date" @if(!empty($query))  value="{{$query->Mazda_date}}"  @endif name="mazdadatefrom" class="form-control" placeholder="Enter Name" >
                  </div>
                  <div class="col-span-4 positon-relative">
                     <label for="txtBox" class="form-label">Type</label>
                     <select class="form-control" name="labour_type">
                        <option value="Mazda"> Mazda </option>
                        <option value="Container"> Container </option>
                     </select>
                  </div>
                  <div class="col-span-4 positon-relative">
                     <label for="txtBox" class="form-label">Number</label>
                     <input id="regular-form-2"  type="text" @if(!empty($query))  value="{{$query->Mazda_name}}"  @endif name="mazdaname" class="form-control" placeholder="Enter Name" >
                  </div>
                  <div class="col-span-6 positon-relative">
                     <label for="txtBox" class="form-label">Point Of Loading</label>
                     <input id="regular-form-2" type="text" @if(!empty($query))  value="{{$query->Piont_of_loading}}"  @endif   name="pointofloading" class="form-control" placeholder="Enter Name" >
                  </div>
                  <div class="col-span-6 positon-relative">
                     <label for="regular-form-2" class="form-label">Amount</label>
                     <input id="regular-form-2"  type="text" @if(!empty($query))  value="{{$query->Mazda_Amount}}"  @endif name="mazdaamount" class="form-control" placeholder="Enter Amount" >
                  </div>
               </div>
            </div>
         </div>
         <button  class="btn btn-primary mt-5">Submit</button>
         </form>
         <br/><br/><br/>
         
          <table id="example" class="table table-hover display nowrap dataTable" style="width:100%">
                  <thead>
                     <tr>
                       
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    
                    @if(isset($dateWiseLabour))
                    @foreach($dateWiseLabour as $key => $labour)
                   
                    <tr>
                        <td>{{$key}}</td>
                         <td>{{array_sum($labour)}}</td>
                         <td> <a href="{{route('nill-labour', ['id' => $key]) }}"> Closing </a> <td> 
                    </tr>
                    @endforeach
                    @endif
                 
               </table>
         
         
         <br/><br/><br/>
         <div id="input" class="p-5">
            <div class="preview">
               <div style="width:50%;float:left; font-size:12px">
               <table id="example" class="table table-hover display nowrap dataTable" style="width:50%;float:left;font-size:13px">
                  <thead>
                     <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Number</th>
                        <th>loading</th>
                        <th>Amount</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $serial = 0; ?>
                     @foreach($mazdadata as $value1)
                     <?php $serial += 1; ?>
                     <tr>
                        <td>{{$serial}}</td>
                        <td>{{$value1->Mazda_date}}</td>
                        <td>{{$value1->Mazda_name}}</td>
                        <td>{{$value1->Piont_of_loading}}</td>
                        <td>{{$value1->Mazda_Amount}}</td>
                        <td>
                           <a href="{{route('edit-mazda-expense', ['id' => $value1->id]) }}">Edit</a> 
                           <a href="{{route('delete-mazda-expense', ['id' => $value1->id]) }}">Delete</a> 
                        </td>
                     </tr>
                     @endforeach
               </table>
               <span style="float:right"> {{ $mazdadata->appends(request()->except('page'))->links() }} </span>
               </div>
               <div style="width:50%;float:right; font-size:12px">
               <table id="example" class="table table-hover display nowrap dataTable" style="width:50%;float:right;font-size:13px">
                  <thead>
                     <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Container</th>
                        <th>Loading</th>
                        <th>Amount</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $serial = 0; ?>
                     @foreach($container as $value2)
                     <?php $serial += 1; ?>
                     <tr>
                        <td>{{$serial}}</td>
                        <td>{{$value2->Container_date}}</td>
                        <td>{{$value2->Container_Number}}</td>
                        <td>{{$value2->Container_pointsale}}</td>
                        <td>{{$value2->Container_Amount}}</td>
                        <td>
                           <a href="{{route('edit-container-expense', ['id' => $value2->id]) }}">Edit</a> 
                           <a href="{{route('delete-container', ['id' => $value2->id]) }}">Delete</a> 
                        </td>
                     </tr>
                     @endforeach
               </table>
               <span style="float:right"> {{ $container->appends(request()->except('page'))->links() }} </span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- BEGIN: Dark Mode Switcher-->
<!-- BEGIN: Dark Mode Switcher-->
<!-- BEGIN: JS Assets-->