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
 View Daily Cash Statement Reports Reports

                  </h2>

               </div>

               <div class="grid grid-cols-12 gap-6 mt-5">

                  <div class="intro-y col-span-12 lg:col-span-12">

                     <!-- BEGIN: Input -->

                     <div class="intro-y box">

                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">


                        <form method="Post" action="{{route('get-expense-data')}}">
                           @csrf
                           <h2 class="font-medium text-base mr-auto">

                      View Daily Cash Statement Reports Reports

                           </h2>

                           <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">

                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>

                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">

                              </div> -->

                        </div>
                        <div class="mt-2 grid grid-cols-12 gap-2 positon-relative ">
                             
                        
                              <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">From Date</label>
                     <input id="regular-form-2"  type="date" name="expensedate" class="form-control" placeholder="Enter Amount" >
                                 </div>
                                     <div class="col-span-4 positon-relative">
                                 <label for="txtBox" class="form-label">To Date</label>
                     <input id="regular-form-2"  type="date" name="expensedate" class="form-control" placeholder="Enter Amount" >
                                 </div>
                     

                        
                             
</div>
<!-- <button  class="btn btn-danger mt-5">Filter</button> -->
<button href="generate-daily-expense"  class="btn btn-danger mt-5">Generate</button>

</form>
                              </div> 
                              <br>

                         
                       
@endsection
      <!-- BEGIN: Dark Mode Switcher-->

      <!-- BEGIN: JS Assets-->

     